<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';
    
    protected $queryString = ['search'];

    public function render()
    {
        $results = [];
        
        if (strlen($this->search) > 2) {
            $results = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/movie', [
                    'query' => $this->search
                ])
                ->json()['results'] ?? [];
        }

        return view('livewire.search-dropdown', [
            'results' => collect($results)->take(8)
        ]);
    }
}
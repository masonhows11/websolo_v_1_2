<?php

namespace App\Http\Livewire\Front\Samples;

use App\Models\Sample;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
class SamplesComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.front.samples.samples-component')
            ->extends('front.include.master_front')
            ->section('main_content')
            ->with(['samples'=>DB::table('samples')->where('approved',1)->paginate(9)]);
    }
}
@extends('layouts.master')

@section('content')

    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        @if(Session::has('success'))
        {{ Session::get('success') }}
        @endif
        <form method="POST" action="{{route('offer.save')}}">
            @csrf
            <div class="container">
                <h1>@lang('messages.addOffer')</h1><br>

                <label for="">Name</label><br>
                <input type="text" name="name" placeholder="Offer name">
                @error('name')
                    <small style="color: firebrick">{{ $message }}</small>
                @enderror <br><br>

                <label for="">Price</label><br>
                <input type="text" name="price" placeholder="Offer price">
                @error('price')
                    <small style="color: firebrick">{{ $message }}</small>
                @enderror <br><br>

                <label for="">Details</label><br>
                <input type="text" name="details" placeholder="Offer details">
                @error('details')
                    <small style="color:firebrick">{{ $message }}</small>
                @enderror <br><br>

                <button type="submit">Save offer</button>
            </div>
        </form>
    </section>
    
@stop




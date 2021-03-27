<div>
    <button wire:click="start" class="text-white btn text-uppercase" style="background-color:  rgb(78, 182, 175)">Start</button>
    <div wire:loading>
        @include('components.includes.loading-state')
    </div>
</div>

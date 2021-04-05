
<div>
    <button wire:click='CheckSubjects' id="checkStatus" type="button" class="btn btn-primary">Check Status</button>
    <div wire:loading>
        @include('components.includes.loading-state')
    </div>
</div>

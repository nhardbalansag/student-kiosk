<div>
    <div class="d-flex justify-content-center">
        <form wire:submit.prevent="searchSubjectAvailable" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Student number</label>
                <input wire:model.defer='studentNumberInfo' required type="text" class="form-control" id="exampleFormControlInput1" placeholder="student number">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Curriculum</label>
                <select wire:model.defer='curriculumInfo' required class="form-select" aria-label="Default select example">
                    <option value ="{{ null }}">Open this select menu</option>
                    @if(count($curriculum) !== 0)
                        @forelse($curriculum as $index)
                            <option value = "{{$index->id}}" >{{$index->title}}</option>
                        @empty
                        @endforelse
                    @endif
                </select>
            </div>
            <div>
                <input type="submit" class="btn btn-primary">
            </div>
       </form>
    </div>
    <div class="mt-5 d-flex justify-content-center">
        <div>
            <p>to use: Click START, then  select curriculum, afterwards select grades from dropdown in each subject..</p>
        </div>
    </div>

    <div wire:loading>
        @include('components.includes.loading-state')
    </div>
</div>

<div>
    <div class="form-group" data-select2-id="80">
        <form wire:submit.prevent="set_grade">
            <div class="row col-12 col-md-12">
                <div class="col-12 col-md-6">
                    <select wire:model='grades' required class="form-select" aria-label="Default select example">
                        <option value="1.0">1.0</option>
                        <option value="1.1">1.1</option>
                        <option value="1.2">1.2</option>
                        <option value="1.3">1.3</option>
                        <option value="1.4">1.4</option>
                        <option value="1.5">1.5</option>
                        <option value="1.6">1.6</option>
                        <option value="1.7">1.7</option>
                        <option value="1.8">1.8</option>
                        <option value="1.9">1.9</option>
                        <option value="2">2</option>
                        <option value="2.1">2.1</option>
                        <option value="2.2">2.2</option>
                        <option value="2.3">2.3</option>
                        <option value="2.4">2.4</option>
                        <option value="2.5">2.5</option>
                        <option value="2.6">2.6</option>
                        <option value="2.7">2.7</option>
                        <option value="2.8">2.8</option>
                        <option value="2.9">2.9</option>
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="inc">INCOMPLETE</option>
                        <option value="hna">HNA</option>
                        <option value="w">WITHDRAWAL</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <input type="submit" value="Set" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <div wire:loading>
        @include('components.includes.loading-state')
    </div>
</div>



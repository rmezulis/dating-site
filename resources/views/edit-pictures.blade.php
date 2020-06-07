@include('layouts.app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header title">{{ __('Edit pictures') }}</div>
                <div class="card-body">
                    @foreach($pictures->chunk(4) as $pictures)
                        <div class="row">
                            @foreach($pictures as $picture)
                                <div class="profile-picture col-3">
                                    @if($pictures->count()>1)
                                    <form method="post" action="{{ route('picture.delete', $picture) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="close">&times;</button>
                                    </form>
                                    @endif
                                    <img src="{{ $picture->getPicture() }}" alt="Picture"
                                         style="width: 150px; height: auto"/>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <form class="form-group" method="post" action="{{ route('pictures.store') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                            <label class="form-control-file" for="pictures[]">Add new photos:</label>
                            <input type="file" class="form-control-file" id="pictures[]" name="pictures[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

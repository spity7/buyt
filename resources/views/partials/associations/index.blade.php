<div class="container">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="associations-index__top">
        <div>
            Create Association:
        </div>
        <a href="{{ route('associations.create') }}" class="btn btn-sm btn-success">Create</a>
    </div>

    <div class="donation-options__bottom">
        @foreach ($associations as $association)
            <div class="donation-option__bottom-option">
                <div class="donation-option__left">
                    <div class="donation-option__left-top">
                        <span id="organization-name">{{ $association->title }}</span>
                    </div>
                    <div class="donation-option__left-bottom">
                        <div class="don-right">
                            <span class="text-secondary" id="organization-type">{{ $association->category }}</span>
                            <span id="organization-address">
                                {{ $association->location }}
                                <i class="fa fa-map-marker mr-2 text-secondary"></i>
                            </span>
                        </div>
                        <div class="assoc-btns">
                            <form action="{{ route('associations.destroy', $association) }}" method="POST"
                                onsubmit="return confirm('Are your sure?');">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                            </form>
                            <a href="{{ route('associations.edit', $association) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="donation-option__right">
                    <img src="https://dev.buytfinder.com/assets/images/logo.png" alt="">
                </div>
            </div>
        @endforeach
        {{ $associations->links() }}
    </div>
</div>

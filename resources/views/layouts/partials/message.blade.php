<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span> <i class="fas fa-check-circle "></i> {{ session('success') }}</span>
        </div>
    @endif

    @if (session()->has('info'))
        <div class="alert alert-info">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span> <i class="fas fa-info-circle "></i> {{ session('info') }}</span>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span> <i class="fas fa-bell "></i> {{ session('error') }}</span>
        </div>
    @endif
</div>

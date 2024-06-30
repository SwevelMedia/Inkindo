@extends('layouts.app')

@section('content')
<section class="px-2 py-3 mb-5" style="background-color: #0A425C;">
    <div class="container">
        <h1 class="text-white">AD & ART</h1>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-3 p-3 shadow bg-body rounded me-md-2 mb-5" style="height: 250px;">
            <h3 class="mb-4">BAB AD & ART</h3>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link text-start active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Pendahuluan</button>
                <button class="nav-link text-start" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">BAB 1</button>
                <button class="nav-link text-start" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">BAB 2</button>
                <button class="nav-link text-start" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">BAB 3</button>
            </div>
        </div>
        <div class="col-md">
            <div class="col shadow p-3 mb-5 bg-body rounded overflow-hidden" style="height: 500px;">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                        <h4 class="text-center">Pendahuluan</h4>
                        <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing amet, lectus orci, integer mauris, mauris dapibus velit proin. Pulvinar eget fusce est amet amet. Ipsum nunc elit lectus eget molestie aliquam ac. Fermentum morbi gravida et, in eu lacus. Dictum morbi tellus id sem. Eu quam convallis amet molestie in venenatis. Auctor iaculis lectus nisl, suspendisse commodo condimentum in in. Sem cras viverra laoreet scelerisque enim quisque. Sit magna posuere vulputate aenean viverra nec vitae ipsum.</p>
                        <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing amet, lectus orci, integer mauris, mauris dapibus velit proin. Pulvinar eget fusce est amet amet. Ipsum nunc elit lectus eget molestie aliquam ac. Fermentum morbi gravida et, in eu lacus. Dictum morbi tellus id sem. Eu quam convallis amet molestie in venenatis. Auctor iaculis lectus nisl, suspendisse commodo condimentum in in. Sem cras viverra laoreet scelerisque enim quisque. Sit magna posuere vulputate aenean viverra nec vitae ipsum.</p>
                        <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing amet, lectus orci, integer mauris, mauris dapibus velit proin. Pulvinar eget fusce est amet amet. Ipsum nunc elit lectus eget molestie aliquam ac. Fermentum morbi gravida et, in eu lacus. Dictum morbi tellus id sem. Eu quam convallis amet molestie in venenatis. Auctor iaculis lectus nisl, suspendisse commodo condimentum in in. Sem cras viverra laoreet scelerisque enim quisque. Sit magna posuere vulputate aenean viverra nec vitae ipsum.</p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <h4 class="text-center">BAB 1</h4>
                        <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing amet, lectus orci, integer mauris, mauris dapibus velit proin. Pulvinar eget fusce est amet amet. Ipsum nunc elit lectus eget molestie aliquam ac. Fermentum morbi gravida et, in eu lacus. Dictum morbi tellus id sem. Eu quam convallis amet molestie in venenatis. Auctor iaculis lectus nisl, suspendisse commodo condimentum in in. Sem cras viverra laoreet scelerisque enim quisque. Sit magna posuere vulputate aenean viverra nec vitae ipsum.</p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                        <h4 class="text-center">BAB 2</h4>
                        <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing amet, lectus orci, integer mauris, mauris dapibus velit proin. Pulvinar eget fusce est amet amet. Ipsum nunc elit lectus eget molestie aliquam ac. Fermentum morbi gravida et, in eu lacus. Dictum morbi tellus id sem. Eu quam convallis amet molestie in venenatis. Auctor iaculis lectus nisl, suspendisse commodo condimentum in in. Sem cras viverra laoreet scelerisque enim quisque. Sit magna posuere vulputate aenean viverra nec vitae ipsum.</p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
                        <h4 class="text-center">BAB 3</h4>
                        <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing amet, lectus orci, integer mauris, mauris dapibus velit proin. Pulvinar eget fusce est amet amet. Ipsum nunc elit lectus eget molestie aliquam ac. Fermentum morbi gravida et, in eu lacus. Dictum morbi tellus id sem. Eu quam convallis amet molestie in venenatis. Auctor iaculis lectus nisl, suspendisse commodo condimentum in in. Sem cras viverra laoreet scelerisque enim quisque. Sit magna posuere vulputate aenean viverra nec vitae ipsum.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
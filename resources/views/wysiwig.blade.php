@extends('layouts.admin')

@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name') }}</a>
            <a class="breadcrumb-item active" href="{{ route('product.discount') }}">Products discount</a>
            {{-- <span class="breadcrumb-item active">{{ $edit_data->category_name }}</span> --}}
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="m-b-30 m-t-0 header-title">Example</h4>
                        <form method="post">
                            <textarea id="txtedt" name="area" placeholder="enter your dlskfjklsj"></textarea>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            if($("#txtedt").length > 0){
                tinymce.init({
                    selector: "textarea#txtedt",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });
    </script>

@endsection


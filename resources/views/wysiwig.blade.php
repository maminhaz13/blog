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
                    <div id="summernote">Hello, universe!</div>
                    <div class="note-editor note-frame card">
                        <div class="note-dropzone">
                            <div class="note-dropzone-message"></div>
                        </div>
                        <div class="note-toolbar card-header">
                            <div class="note-btn-group btn-group note-style">
                                <div class="note-btn-group btn-group"><button type="button"
                                        class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1"
                                        data-toggle="dropdown"><i class="note-icon-magic"></i></button>
                                    <div class="dropdown-menu dropdown-style"><a class="dropdown-item" href="#"
                                            data-value="p">
                                            <p>Normal</p>
                                        </a><a class="dropdown-item" href="#" data-value="blockquote">
                                            <blockquote>Quote</blockquote>
                                        </a><a class="dropdown-item" href="#" data-value="pre">
                                            <pre>Code</pre></a><a class="dropdown-item" href="#" data-value="h1">
                                            <h1>Header 1</h1>
                                        </a><a class="dropdown-item" href="#" data-value="h2">
                                            <h2>Header 2</h2>
                                        </a><a class="dropdown-item" href="#" data-value="h3">
                                            <h3>Header 3</h3>
                                        </a><a class="dropdown-item" href="#" data-value="h4">
                                            <h4>Header 4</h4>
                                        </a><a class="dropdown-item" href="#" data-value="h5">
                                            <h5>Header 5</h5>
                                        </a><a class="dropdown-item" href="#" data-value="h6">
                                            <h6>Header 6</h6>
                                        </a></div>
                                </div>
                            </div>
                            <div class="note-btn-group btn-group note-font"><button type="button"
                                    class="note-btn btn btn-light btn-sm note-btn-bold" tabindex="-1"><i
                                        class="note-icon-bold"></i></button><button type="button"
                                    class="note-btn btn btn-light btn-sm note-btn-underline" tabindex="-1"><i
                                        class="note-icon-underline"></i></button><button type="button"
                                    class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                        class="note-icon-eraser"></i></button></div>
                            <div class="note-btn-group btn-group note-fontname">
                                <div class="note-btn-group btn-group"><button type="button"
                                        class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1"
                                        data-toggle="dropdown"><span class="note-current-fontname">Arial</span></button>
                                    <div class="dropdown-menu note-check dropdown-fontname"><a
                                            class="dropdown-item checked" href="#" data-value="Arial"><i
                                                class="note-icon-menu-check"></i> <span
                                                style="font-family:Arial">Arial</span></a><a class="dropdown-item"
                                            href="#" data-value="Arial Black"><i class="note-icon-menu-check"></i> <span
                                                style="font-family:Arial Black">Arial Black</span></a><a
                                            class="dropdown-item" href="#" data-value="Comic Sans MS"><i
                                                class="note-icon-menu-check"></i> <span
                                                style="font-family:Comic Sans MS">Comic Sans MS</span></a><a
                                            class="dropdown-item" href="#" data-value="Courier New"><i
                                                class="note-icon-menu-check"></i> <span
                                                style="font-family:Courier New">Courier New</span></a><a
                                            class="dropdown-item" href="#" data-value="Helvetica"><i
                                                class="note-icon-menu-check"></i> <span
                                                style="font-family:Helvetica">Helvetica</span></a><a
                                            class="dropdown-item" href="#" data-value="Impact"><i
                                                class="note-icon-menu-check"></i> <span
                                                style="font-family:Impact">Impact</span></a><a class="dropdown-item"
                                            href="#" data-value="Tahoma"><i class="note-icon-menu-check"></i> <span
                                                style="font-family:Tahoma">Tahoma</span></a><a class="dropdown-item"
                                            href="#" data-value="Times New Roman"><i class="note-icon-menu-check"></i>
                                            <span style="font-family:Times New Roman">Times New Roman</span></a><a
                                            class="dropdown-item" href="#" data-value="Verdana"><i
                                                class="note-icon-menu-check"></i> <span
                                                style="font-family:Verdana">Verdana</span></a></div>
                                </div>
                            </div>
                            <div class="note-btn-group btn-group note-color">
                                <div class="note-btn-group btn-group note-color"><button type="button"
                                        class="note-btn btn btn-light btn-sm note-current-color-button" tabindex="-1"
                                        data-backcolor="#C67BA5"><i class="note-icon-font note-recent-color"
                                            style="background-color: rgb(198, 123, 165);"></i></button><button
                                        type="button" class="note-btn btn btn-light btn-sm dropdown-toggle"
                                        tabindex="-1" data-toggle="dropdown" aria-expanded="false"></button>
                                    <div class="dropdown-menu" x-placement="bottom-start"
                                        style="position: absolute; transform: translate3d(33px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <div class="note-palette">
                                            <div class="note-palette-title">Background Color</div>
                                            <div> <button type="button" class="note-color-reset btn btn-light"
                                                    data-event="backColor" data-value="inherit">Transparent </button>
                                            </div>
                                            <div class="note-holder" data-event="backColor">
                                                <div class="note-color-palette">
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#000000"
                                                            data-event="backColor" data-value="#000000" title="#000000"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#424242" data-event="backColor"
                                                            data-value="#424242" title="#424242" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#636363"
                                                            data-event="backColor" data-value="#636363" title="#636363"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#9C9C94" data-event="backColor"
                                                            data-value="#9C9C94" title="#9C9C94" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#CEC6CE"
                                                            data-event="backColor" data-value="#CEC6CE" title="#CEC6CE"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#EFEFEF" data-event="backColor"
                                                            data-value="#EFEFEF" title="#EFEFEF" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#F7F7F7"
                                                            data-event="backColor" data-value="#F7F7F7" title="#F7F7F7"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#FFFFFF" data-event="backColor"
                                                            data-value="#FFFFFF" title="#FFFFFF" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#FF0000"
                                                            data-event="backColor" data-value="#FF0000" title="#FF0000"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#FF9C00" data-event="backColor"
                                                            data-value="#FF9C00" title="#FF9C00" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#FFFF00"
                                                            data-event="backColor" data-value="#FFFF00" title="#FFFF00"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#00FF00" data-event="backColor"
                                                            data-value="#00FF00" title="#00FF00" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#00FFFF"
                                                            data-event="backColor" data-value="#00FFFF" title="#00FFFF"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#0000FF" data-event="backColor"
                                                            data-value="#0000FF" title="#0000FF" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#9C00FF"
                                                            data-event="backColor" data-value="#9C00FF" title="#9C00FF"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#FF00FF" data-event="backColor"
                                                            data-value="#FF00FF" title="#FF00FF" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#F7C6CE"
                                                            data-event="backColor" data-value="#F7C6CE" title="#F7C6CE"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#FFE7CE" data-event="backColor"
                                                            data-value="#FFE7CE" title="#FFE7CE" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#FFEFC6"
                                                            data-event="backColor" data-value="#FFEFC6" title="#FFEFC6"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#D6EFD6" data-event="backColor"
                                                            data-value="#D6EFD6" title="#D6EFD6" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#CEDEE7"
                                                            data-event="backColor" data-value="#CEDEE7" title="#CEDEE7"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#CEE7F7" data-event="backColor"
                                                            data-value="#CEE7F7" title="#CEE7F7" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#D6D6E7"
                                                            data-event="backColor" data-value="#D6D6E7" title="#D6D6E7"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#E7D6DE" data-event="backColor"
                                                            data-value="#E7D6DE" title="#E7D6DE" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#E79C9C"
                                                            data-event="backColor" data-value="#E79C9C" title="#E79C9C"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#FFC69C" data-event="backColor"
                                                            data-value="#FFC69C" title="#FFC69C" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#FFE79C"
                                                            data-event="backColor" data-value="#FFE79C" title="#FFE79C"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#B5D6A5" data-event="backColor"
                                                            data-value="#B5D6A5" title="#B5D6A5" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#A5C6CE"
                                                            data-event="backColor" data-value="#A5C6CE" title="#A5C6CE"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#9CC6EF" data-event="backColor"
                                                            data-value="#9CC6EF" title="#9CC6EF" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#B5A5D6"
                                                            data-event="backColor" data-value="#B5A5D6" title="#B5A5D6"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#D6A5BD" data-event="backColor"
                                                            data-value="#D6A5BD" title="#D6A5BD" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#E76363"
                                                            data-event="backColor" data-value="#E76363" title="#E76363"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#F7AD6B" data-event="backColor"
                                                            data-value="#F7AD6B" title="#F7AD6B" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#FFD663"
                                                            data-event="backColor" data-value="#FFD663" title="#FFD663"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#94BD7B" data-event="backColor"
                                                            data-value="#94BD7B" title="#94BD7B" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#73A5AD"
                                                            data-event="backColor" data-value="#73A5AD" title="#73A5AD"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#6BADDE" data-event="backColor"
                                                            data-value="#6BADDE" title="#6BADDE" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#8C7BC6"
                                                            data-event="backColor" data-value="#8C7BC6" title="#8C7BC6"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#C67BA5" data-event="backColor"
                                                            data-value="#C67BA5" title="#C67BA5" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#CE0000"
                                                            data-event="backColor" data-value="#CE0000" title="#CE0000"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#E79439" data-event="backColor"
                                                            data-value="#E79439" title="#E79439" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#EFC631"
                                                            data-event="backColor" data-value="#EFC631" title="#EFC631"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#6BA54A" data-event="backColor"
                                                            data-value="#6BA54A" title="#6BA54A" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#4A7B8C"
                                                            data-event="backColor" data-value="#4A7B8C" title="#4A7B8C"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#3984C6" data-event="backColor"
                                                            data-value="#3984C6" title="#3984C6" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#634AA5"
                                                            data-event="backColor" data-value="#634AA5" title="#634AA5"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#A54A7B" data-event="backColor"
                                                            data-value="#A54A7B" title="#A54A7B" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#9C0000"
                                                            data-event="backColor" data-value="#9C0000" title="#9C0000"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#B56308" data-event="backColor"
                                                            data-value="#B56308" title="#B56308" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#BD9400"
                                                            data-event="backColor" data-value="#BD9400" title="#BD9400"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#397B21" data-event="backColor"
                                                            data-value="#397B21" title="#397B21" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#104A5A"
                                                            data-event="backColor" data-value="#104A5A" title="#104A5A"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#085294" data-event="backColor"
                                                            data-value="#085294" title="#085294" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#311873"
                                                            data-event="backColor" data-value="#311873" title="#311873"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#731842" data-event="backColor"
                                                            data-value="#731842" title="#731842" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#630000"
                                                            data-event="backColor" data-value="#630000" title="#630000"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#7B3900" data-event="backColor"
                                                            data-value="#7B3900" title="#7B3900" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#846300"
                                                            data-event="backColor" data-value="#846300" title="#846300"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#295218" data-event="backColor"
                                                            data-value="#295218" title="#295218" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#083139"
                                                            data-event="backColor" data-value="#083139" title="#083139"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#003163" data-event="backColor"
                                                            data-value="#003163" title="#003163" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#21104A"
                                                            data-event="backColor" data-value="#21104A" title="#21104A"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#4A1031" data-event="backColor"
                                                            data-value="#4A1031" title="#4A1031" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="note-palette">
                                            <div class="note-palette-title">Foreground Color</div>
                                            <div> <button type="button" class="note-color-reset btn btn-light"
                                                    data-event="removeFormat" data-value="foreColor">Reset to default
                                                </button> </div>
                                            <div class="note-holder" data-event="foreColor">
                                                <div class="note-color-palette">
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#000000"
                                                            data-event="foreColor" data-value="#000000" title="#000000"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#424242" data-event="foreColor"
                                                            data-value="#424242" title="#424242" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#636363"
                                                            data-event="foreColor" data-value="#636363" title="#636363"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#9C9C94" data-event="foreColor"
                                                            data-value="#9C9C94" title="#9C9C94" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#CEC6CE"
                                                            data-event="foreColor" data-value="#CEC6CE" title="#CEC6CE"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#EFEFEF" data-event="foreColor"
                                                            data-value="#EFEFEF" title="#EFEFEF" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#F7F7F7"
                                                            data-event="foreColor" data-value="#F7F7F7" title="#F7F7F7"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#FFFFFF" data-event="foreColor"
                                                            data-value="#FFFFFF" title="#FFFFFF" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#FF0000"
                                                            data-event="foreColor" data-value="#FF0000" title="#FF0000"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#FF9C00" data-event="foreColor"
                                                            data-value="#FF9C00" title="#FF9C00" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#FFFF00"
                                                            data-event="foreColor" data-value="#FFFF00" title="#FFFF00"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#00FF00" data-event="foreColor"
                                                            data-value="#00FF00" title="#00FF00" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#00FFFF"
                                                            data-event="foreColor" data-value="#00FFFF" title="#00FFFF"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#0000FF" data-event="foreColor"
                                                            data-value="#0000FF" title="#0000FF" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#9C00FF"
                                                            data-event="foreColor" data-value="#9C00FF" title="#9C00FF"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#FF00FF" data-event="foreColor"
                                                            data-value="#FF00FF" title="#FF00FF" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#F7C6CE"
                                                            data-event="foreColor" data-value="#F7C6CE" title="#F7C6CE"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#FFE7CE" data-event="foreColor"
                                                            data-value="#FFE7CE" title="#FFE7CE" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#FFEFC6"
                                                            data-event="foreColor" data-value="#FFEFC6" title="#FFEFC6"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#D6EFD6" data-event="foreColor"
                                                            data-value="#D6EFD6" title="#D6EFD6" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#CEDEE7"
                                                            data-event="foreColor" data-value="#CEDEE7" title="#CEDEE7"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#CEE7F7" data-event="foreColor"
                                                            data-value="#CEE7F7" title="#CEE7F7" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#D6D6E7"
                                                            data-event="foreColor" data-value="#D6D6E7" title="#D6D6E7"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#E7D6DE" data-event="foreColor"
                                                            data-value="#E7D6DE" title="#E7D6DE" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#E79C9C"
                                                            data-event="foreColor" data-value="#E79C9C" title="#E79C9C"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#FFC69C" data-event="foreColor"
                                                            data-value="#FFC69C" title="#FFC69C" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#FFE79C"
                                                            data-event="foreColor" data-value="#FFE79C" title="#FFE79C"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#B5D6A5" data-event="foreColor"
                                                            data-value="#B5D6A5" title="#B5D6A5" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#A5C6CE"
                                                            data-event="foreColor" data-value="#A5C6CE" title="#A5C6CE"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#9CC6EF" data-event="foreColor"
                                                            data-value="#9CC6EF" title="#9CC6EF" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#B5A5D6"
                                                            data-event="foreColor" data-value="#B5A5D6" title="#B5A5D6"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#D6A5BD" data-event="foreColor"
                                                            data-value="#D6A5BD" title="#D6A5BD" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#E76363"
                                                            data-event="foreColor" data-value="#E76363" title="#E76363"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#F7AD6B" data-event="foreColor"
                                                            data-value="#F7AD6B" title="#F7AD6B" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#FFD663"
                                                            data-event="foreColor" data-value="#FFD663" title="#FFD663"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#94BD7B" data-event="foreColor"
                                                            data-value="#94BD7B" title="#94BD7B" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#73A5AD"
                                                            data-event="foreColor" data-value="#73A5AD" title="#73A5AD"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#6BADDE" data-event="foreColor"
                                                            data-value="#6BADDE" title="#6BADDE" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#8C7BC6"
                                                            data-event="foreColor" data-value="#8C7BC6" title="#8C7BC6"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#C67BA5" data-event="foreColor"
                                                            data-value="#C67BA5" title="#C67BA5" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#CE0000"
                                                            data-event="foreColor" data-value="#CE0000" title="#CE0000"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#E79439" data-event="foreColor"
                                                            data-value="#E79439" title="#E79439" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#EFC631"
                                                            data-event="foreColor" data-value="#EFC631" title="#EFC631"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#6BA54A" data-event="foreColor"
                                                            data-value="#6BA54A" title="#6BA54A" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#4A7B8C"
                                                            data-event="foreColor" data-value="#4A7B8C" title="#4A7B8C"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#3984C6" data-event="foreColor"
                                                            data-value="#3984C6" title="#3984C6" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#634AA5"
                                                            data-event="foreColor" data-value="#634AA5" title="#634AA5"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#A54A7B" data-event="foreColor"
                                                            data-value="#A54A7B" title="#A54A7B" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#9C0000"
                                                            data-event="foreColor" data-value="#9C0000" title="#9C0000"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#B56308" data-event="foreColor"
                                                            data-value="#B56308" title="#B56308" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#BD9400"
                                                            data-event="foreColor" data-value="#BD9400" title="#BD9400"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#397B21" data-event="foreColor"
                                                            data-value="#397B21" title="#397B21" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#104A5A"
                                                            data-event="foreColor" data-value="#104A5A" title="#104A5A"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#085294" data-event="foreColor"
                                                            data-value="#085294" title="#085294" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#311873"
                                                            data-event="foreColor" data-value="#311873" title="#311873"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#731842" data-event="foreColor"
                                                            data-value="#731842" title="#731842" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                    <div class="note-color-row"><button type="button"
                                                            class="note-color-btn" style="background-color:#630000"
                                                            data-event="foreColor" data-value="#630000" title="#630000"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#7B3900" data-event="foreColor"
                                                            data-value="#7B3900" title="#7B3900" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#846300"
                                                            data-event="foreColor" data-value="#846300" title="#846300"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#295218" data-event="foreColor"
                                                            data-value="#295218" title="#295218" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#083139"
                                                            data-event="foreColor" data-value="#083139" title="#083139"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#003163" data-event="foreColor"
                                                            data-value="#003163" title="#003163" data-toggle="button"
                                                            tabindex="-1"></button><button type="button"
                                                            class="note-color-btn" style="background-color:#21104A"
                                                            data-event="foreColor" data-value="#21104A" title="#21104A"
                                                            data-toggle="button" tabindex="-1"></button><button
                                                            type="button" class="note-color-btn"
                                                            style="background-color:#4A1031" data-event="foreColor"
                                                            data-value="#4A1031" title="#4A1031" data-toggle="button"
                                                            tabindex="-1"></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="note-btn-group btn-group note-para"><button type="button"
                                    class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                        class="note-icon-unorderedlist"></i></button><button type="button"
                                    class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                        class="note-icon-orderedlist"></i></button>
                                <div class="note-btn-group btn-group"><button type="button"
                                        class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1"
                                        data-toggle="dropdown"><i class="note-icon-align-left"></i></button>
                                    <div class="dropdown-menu">
                                        <div class="note-btn-group btn-group note-align"><button type="button"
                                                class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                                    class="note-icon-align-left"></i></button><button type="button"
                                                class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                                    class="note-icon-align-center"></i></button><button type="button"
                                                class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                                    class="note-icon-align-right"></i></button><button type="button"
                                                class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                                    class="note-icon-align-justify"></i></button></div>
                                        <div class="note-btn-group btn-group note-list"><button type="button"
                                                class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                                    class="note-icon-align-outdent"></i></button><button type="button"
                                                class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                                    class="note-icon-align-indent"></i></button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="note-btn-group btn-group note-table">
                                <div class="note-btn-group btn-group"><button type="button"
                                        class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1"
                                        data-toggle="dropdown"><i class="note-icon-table"></i></button>
                                    <div class="dropdown-menu note-table">
                                        <div class="note-dimension-picker">
                                            <div class="note-dimension-picker-mousecatcher" data-event="insertTable"
                                                data-value="1x1" style="width: 10em; height: 10em;"></div>
                                            <div class="note-dimension-picker-highlighted"></div>
                                            <div class="note-dimension-picker-unhighlighted"></div>
                                        </div>
                                        <div class="note-dimension-display">1 x 1</div>
                                    </div>
                                </div>
                            </div>
                            <div class="note-btn-group btn-group note-insert"><button type="button"
                                    class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                        class="note-icon-link"></i></button><button type="button"
                                    class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                        class="note-icon-picture"></i></button><button type="button"
                                    class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                        class="note-icon-video"></i></button></div>
                            <div class="note-btn-group btn-group note-view"><button type="button"
                                    class="note-btn btn btn-light btn-sm btn-fullscreen" tabindex="-1"><i
                                        class="note-icon-arrows-alt"></i></button><button type="button"
                                    class="note-btn btn btn-light btn-sm btn-codeview" tabindex="-1"><i
                                        class="note-icon-code"></i></button><button type="button"
                                    class="note-btn btn btn-light btn-sm" tabindex="-1"><i
                                        class="note-icon-question"></i></button></div>
                        </div>
                        <div class="note-editing-area">
                            <div class="note-handle">
                                <div class="note-control-selection" style="display: none;">
                                    <div class="note-control-selection-bg"></div>
                                    <div class="note-control-holder note-control-nw"></div>
                                    <div class="note-control-holder note-control-ne"></div>
                                    <div class="note-control-holder note-control-sw"></div>
                                    <div class="note-control-sizing note-control-se"></div>
                                    <div class="note-control-selection-info"></div>
                                </div>
                            </div><textarea class="note-codable"></textarea>
                            <div class="note-editable card-block" contenteditable="true" style="height: 49px;"><span
                                    style="background-color: rgb(198, 123, 165);">Hello, universe!</span></div>
                        </div>
                        <div class="note-statusbar">
                            <div class="note-resizebar">
                                <div class="note-icon-bar"></div>
                                <div class="note-icon-bar"></div>
                                <div class="note-icon-bar"></div>
                            </div>
                        </div>
                        <div class="modal link-dialog" aria-hidden="false" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Insert Link</h4> <button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group note-form-group"><label class="note-form-label">Text to
                                                display</label><input
                                                class="note-link-text form-control  note-form-control  note-input"
                                                type="text"></div>
                                        <div class="form-group note-form-group"><label class="note-form-label">To what
                                                URL should this link go?</label><input
                                                class="note-link-url form-control note-form-control note-input"
                                                type="text" value="http://"></div><label
                                            class="custom-control custom-checkbox" for="sn-checkbox-open-in-new-window">
                                            <input type="checkbox" class="custom-control-input"
                                                id="sn-checkbox-open-in-new-window" checked=""> <span
                                                class="custom-control-indicator"></span> <span
                                                class="custom-control-description">Open in new window</span></label>
                                    </div>
                                    <div class="modal-footer"><button href="#"
                                            class="btn btn-primary note-btn note-btn-primary note-link-btn disabled"
                                            disabled="">Insert Link</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal" aria-hidden="false" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Insert Image</h4> <button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group note-form-group note-group-select-from-files"><label
                                                class="note-form-label">Select from files</label><input
                                                class="note-image-input form-control note-form-control note-input"
                                                type="file" name="files" accept="image/*" multiple="multiple"></div>
                                        <div class="form-group note-group-image-url" style="overflow:auto;"><label
                                                class="note-form-label">Image URL</label><input
                                                class="note-image-url form-control note-form-control note-input  col-md-12"
                                                type="text"></div>
                                    </div>
                                    <div class="modal-footer"><button href="#"
                                            class="btn btn-primary note-btn note-btn-primary note-image-btn disabled"
                                            disabled="">Insert Image</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal" aria-hidden="false" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Insert Video</h4> <button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group note-form-group row-fluid"><label
                                                class="note-form-label">Video URL? <small class="text-muted">(YouTube,
                                                    Vimeo, Vine, Instagram, DailyMotion or Youku)</small></label><input
                                                class="note-video-url form-control  note-form-control note-input span12"
                                                type="text"></div>
                                    </div>
                                    <div class="modal-footer"><button href="#"
                                            class="btn btn-primary note-btn note-btn-primary  note-video-btn disabled"
                                            disabled="">Insert Video</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal" aria-hidden="false" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Help</h4> <button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body" style="max-height: 300px; overflow: scroll;">
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>ENTER</kbd></label><span>Insert
                                            Paragraph</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+Z</kbd></label><span>Undoes
                                            the last command</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+Y</kbd></label><span>Redoes
                                            the last command</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>TAB</kbd></label><span>Tab</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>SHIFT+TAB</kbd></label><span>Untab</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+B</kbd></label><span>Set
                                            a bold style</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+I</kbd></label><span>Set
                                            a italic style</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+U</kbd></label><span>Set
                                            a underline style</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+S</kbd></label><span>Set
                                            a strikethrough style</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+BACKSLASH</kbd></label><span>Clean
                                            a style</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+L</kbd></label><span>Set
                                            left align</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+E</kbd></label><span>Set
                                            center align</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+R</kbd></label><span>Set
                                            right align</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+J</kbd></label><span>Set
                                            full align</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM7</kbd></label><span>Toggle
                                            unordered list</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM8</kbd></label><span>Toggle
                                            ordered list</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+LEFTBRACKET</kbd></label><span>Outdent
                                            on current paragraph</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+RIGHTBRACKET</kbd></label><span>Indent
                                            on current paragraph</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM0</kbd></label><span>Change
                                            current block's format as a paragraph(P tag)</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM1</kbd></label><span>Change
                                            current block's format as H1</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM2</kbd></label><span>Change
                                            current block's format as H2</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM3</kbd></label><span>Change
                                            current block's format as H3</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM4</kbd></label><span>Change
                                            current block's format as H4</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM5</kbd></label><span>Change
                                            current block's format as H5</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM6</kbd></label><span>Change
                                            current block's format as H6</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+ENTER</kbd></label><span>Insert
                                            horizontal rule</span>
                                        <div class="help-list-item"></div><label
                                            style="width: 180px; margin-right: 10px;"><kbd>CTRL+K</kbd></label><span>Show
                                            Link Dialog</span>
                                    </div>
                                    <div class="modal-footer">
                                        <p class="text-center"><a href="http://summernote.org/"
                                                target="_blank">Summernote 0.8.8</a> · <a
                                                href="https://github.com/summernote/summernote"
                                                target="_blank">Project</a> · <a
                                                href="https://github.com/summernote/summernote/issues"
                                                target="_blank">Issues</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card-box">
                        <h4 class="m-b-30 m-t-0 header-title">Example</h4>
                        <form method="post">
                            <textarea id="txtedt" name="area" placeholder="enter your dlskfjklsj"></textarea>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>






    <script type="text/javascript">
        $('#summernote').summernote({
        height: 150
        })
    </script>


    {{-- <script type="text/javascript">
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
    </script> --}}

@endsection


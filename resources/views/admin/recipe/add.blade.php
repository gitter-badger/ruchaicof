@extends('admin.panel')

@section('admin-page-content')
    <h1>Шаг 1. Создание рецепта</h1>
    <form method="POST" action="{{ url('/admin/recipe/add') }}" enctype='multipart/form-data'>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class='form-group'>
            <label>
                Название:
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" autocomplete="off">
                @foreach ($errors->get('name') as $error)
                    <span class="bg-danger">{{ $error }}</span>
                @endforeach
            </label>
        </div>

        <div class="form-group">
            <label>
                Категория:
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                        @if (old('category_id') == $category->id) {{ 'selected' }} @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </label>
        </div>

        <div class='form-group'>
            <label>
                Описание:
                <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                @foreach ($errors->get('description') as $error)
                    <span class="bg-danger">{{ $error }}</span>
                @endforeach
            </label>
        </div>

        <div class='form-group'>
            <label>Изображение:<br>
                <input name="image" type="file" value="{{ old('image') }}">
                @foreach ($errors->get('image') as $error)
                    <span class="bg-danger">{{ $error }}</span>
                @endforeach
            </label>
        </div>

        <div class='form-group'>
            <label>
                Содержание:
                <textarea id="content" name="content" class="form-control" style="width: 1000px; height: 500px;">{{ old('content') }}</textarea>
                @foreach ($errors->get('content') as $error)
                    <span class="bg-danger">{{ $error }}</span>
                @endforeach
            </label>
        </div>

        <div class='form-group'>
            <input id="submit" type="submit" value="Добавить" class="btn btn-primary">
        </div>

    </form>
    <script>
        $('#content').wysihtml5({
            "stylesheets": ["{{ asset('css/iframe-style.css') }}"]
        });
    </script>
@stop
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        .dropdown-toggle{
            height: 40px;
            width: 400px !important;
        }
    </style>
</head>
<body>
<div class="editpost">
    <form action="{{route('posts.update',$post->id)}}" method="POST">
        @csrf 
        @method('PUT')
        <input type="hidden" name="user_id" value="{{$post->user_id}}">
        <div class="form-data">
            <label for="title">Title</label><br/>
            <input type="text" name="title" id="title" value="{{$post->title}}">
        </div>

        <div class="form-data">
            <label for="content">Content</label></br>
            <textarea name="content" id="content" cols="30" rows="10">{{$post->content}}</textarea>
        </div>

        <div class="form-data">
            <label for="category">Category</label><br/>
            <select name="category_id" id="category">
                <option value="{{$post->category_id}}">{{$post->category->name}}</option>
                @foreach($categories as $category)
                    @if($category->id !== $post->category_id)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-data">
            <label for="tag">Tag</label></br>
            <select class="selectpicker" name="tag_id[]" multiple id="tag" multiple data-live-search="true">
                @foreach($tags as $tag)
                    <option 
                        @foreach($post->tags as $postTag)
                            {{$postTag->id == $tag->id ? 'selected':''}}
                        @endforeach
                    value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            
            </select>
        </div>

        @if(!$post->published)
        <div class="form-data">
            <label for="published">Published</label>
            <input type="checkbox" name="published" id="published"
            value="1">
           
        </div>
       @endif
        <div class="form-data">
            <button type="submit" class="subBtn">Submit</button>
        </div>
    </form>

    
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
</body>
</html>


@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                    Dashboard
                    </li>
                </ol>
            </div><!--col end-->
        </div><!--row end-->
    </div><!--container end-->
</div>

<section class="content">
    <div class="container-fluid">
    
    </div>
</section>
@include('home.category.modal')
@endsection
<!--home.permission.role-->

@section('scripts')
<script type="text/javascript">
function eventest () {
    var nav_items = $(this).find('.nav-sidebar li')

    $('.nav-sidebar a').on('click', function (e) {
        nav_items.removeClass('active').eq(nav_items.index($(this))).addClass('active');
        });
}
//location.pathname.replace(, '')
page.base('/home');
page('/', dashboard);
page('/posts', posts);
page('/posts/create', createPost);
page('/posts/:id/edit/', editPost);
page('/posts/:id/update/', updatePost)
page('/categories/create', createCategory)

page('/permission', permission);
//page('/contact', contact);
page();


var card_head = $(this).find('.content .card .card-head')
var card_body = $(this).find('.content .card .card-body')
var columns = $(this).find('.content-header h1')

function dashboard()
{
    axios.get('api/posts/')
    .then(function (response) {

        console.log(response.data.data);

        $('.content-header h1').text('Dashboard')
    //

        var template = Hogan.compile($('#posts_content_template').html())

        //var posts = JSON.parse(response.data.data)  .card

        var content = template.render({list: response.data.data})
        $('.content').empty().append(content)

        $('#posts-table').DataTable({
            scrollY: 400,
            "columnDefs": [
                { "orderable": false, "searchable": false, "targets": 1 },
                { "orderable": false, "searchable": false, "targets": 4 }
                ]
        });
        response.data.data.map(function(obj) {
            //Swal.fire(obj)
        })
        
        
        
    })
    .catch(function (error) {
        // handle error
        console.log(error);
    })
    .then(function () {
        // always executed
    });
/*
    {
    "info":     false,
    "columnDefs": [ 
            {
                "targets": [ 2 ],
                "ordering": false,
                "searchable": false
            }
        ]
    }
    */
    
    
}



function createCategory(ctx, next)
{
    
    var template = Hogan.compile($('#category_modal_content_template').html())

    var content = template.render()
    $('.content').append(content)
    $('#categoryModal').modal()
    //
    $('.modal-footer button:last').click(function () {
        Swal.fire('hello world')
        var data = {
            name: $('.modal-body #name').val(),
            path: $('.modal-body #path').val()
        }
        JSON.stringify(data)
        axios.post('http://ourbox.test/api/categories/', data)
        .then(function (response) {

            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        })
    })

}

function createPost()
{
    var template = Hogan.compile($('#post_form_content_template').html())

    var content = template.render()
    $('.content').empty().append(content)
    Swal.fire('Hello world')

    var simplemde = new SimpleMDE({ 
        autofocus: true,
        autosave: {
            enabled: true,
            uniqueId: "MyUniqueID",
            delay: 1000,
        },
        blockStyles: {
            bold: "__",
            italic: "_"
        },
        element: $('#smde')[0],
        showIcons: ["code", "table"],

    });

    $('#tags').select2({
    tags: true,
    tokenSeparators: [',', ' ']
    });



}

function editPost(ctx, next)
{
    
    Promise.all([
        axios.get('http://ourbox.test/api/posts/', ctx.params),
        axios.get('http://ourbox.test/api/categories/'),
        axios.get('http://ourbox.test/api/tags/')])
        .then(function (response) {
        var template = Hogan.compile($('#post_form_content_template').html())
//
        var content = template.render({
            post: response[0].data.data[0], 
            categories: response[1].data.data,
            tags: response[2].data.data,
            })
        $('.content').empty().append(content)
        
/*
        var simplemde = new SimpleMDE({ 
            autofocus: true,
            element: $('#smde')[0],
            showIcons: ["code", "table"],

        });
        */
        $('#editor').toastuiEditor({
        height: '500px',
        initialEditType: 'markdown',
        previewStyle: 'vertical'
        });


       $('#tags').select2({
        tags: true,
        tokenSeparators: [',', ' '],
        });
        $('#submit_button').val('更新').click(function () {
            
            var t = $('#tags').select2('data')
            
            var categories = [];
            $('input:checkbox:checked').each(function (index, item) {
                categories.push($(this).val());
            });
            console.log(categories);

            
            var data = {
                title: $('#title').val(),
                content: $('#editor').toastuiEditor('getHtml'),//simplemde.value()
                categories: categories,
                tags: t
            }
            
            JSON.stringify(data)
                    
                    axios.put('http://ourbox.test/api/posts/' + ctx.params.id, data)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    
                    
                 })

                 /*
                    attr('href', '/home/posts/' + ctx.params.id + '/update')
         
                */
           
            });
        

        console.log(response);
        })
        .catch(function (error) {
            console.log(error);
            })
            .then(function () {
                // always executed
                });  


    
    
   
}

function updatePost(ctx, next)
{

    
    Swal.fire('hello bitch')
}

function deletePost()
{

}

function posts() {



    var button_icon = '<i></i>'
    button_icon.addClass('fas fa-plus')
    var create_button = '<a></a>'
    create_button.attr("href","http://www.runoob.com/jquery")
    create_button.addClass('btn btn-sm btn-primary')
    create_button.append(button_icon, '创建新文章')
    card_head.append(create_button)


}
//axios.defaults.baseURL = 'http://ourbox.test/';
function permission() {
    
    axios.get('api/role/')
    .then(function (response) {
        // handle success
        Swal.fire(response.data)
        console.log(response);
    })
    .catch(function (error) {
        // handle error
        console.log(error);
    })
    .then(function () {
        // always executed
    });

}
$(document).ready(function(){
});
</script>
@stop
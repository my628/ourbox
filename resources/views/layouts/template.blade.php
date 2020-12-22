@verbatim
<script id='posts_content_template' type='text/template'>
    <div class="row">
        <div class="col-md">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="/home/posts/create" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i> 新增
                        </a>

                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-sm btn-info">
                                <i class="fas fa-download"></i> 导出
                            </button>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="/home/posts/download">all</a>
                                <a class="dropdown-item" href="#">current</a>
                                <a class="dropdown-item" href="#">selected row</a>
                            </div>
                        </div>

                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-table"></i>

                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                            <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                          </ul>
                        </div>

                    </div><!--card-tools-->
                </div><!--card-header end    display order-column-->
                <div class="card-body">
                    <table id="posts-table" class="table table-sm table-hover table-bordered"> 
                        <thead class="thead-light">
                            <tr>
                                <th>标题</th>
                                <th>发布状态</th>
                                <th>评论数</th>
                                <th>阅读数</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{#list}}
                            <tr>
                                <td><a href="">{{ title }} ({{ published_at }})</a></td>
                                <td>{{ is_draft}} </td>
                                <td>{{ comment_count }}</td>
                                <td>{{ view_count }}</td>
                                <td>
                                    <!--class="btn btn-sm btn-info" class="btn btn-sm btn-warning"-->
                                    <a href="home/posts/{{ id }}/edit">
                                        <i class="far fa-edit"></i> 
                                    </a>
                                    <a href="home/posts/delete" >
                                        <i class="fas fa-trash-alt"></i> 
                                    </a>
                                </td>
                            </tr>
                        {{/list}}
                        </tbody>
                    </table>
                </div><!--card-body end-->
            </div>
        </div>
    </div>
</script>
<!---->
<script id='post_form_content_template' type='text/template'>
    <div class="row justify-content-center">  <!---->
        <div class="col-md-8">  
            <div class="card card-outline card-primary">
                <div class="card-header">
                    Create post
                </div>
                <div class="card-body">
                {{#post}}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Example input" value="{{ title }}">
                    </div>
                    <div class="form-group">
                    <!--
                        <label for="content">Content:</label>
                        <textarea class="form-control" aria-label="With textarea" name="content" id="smde"> </textarea>
                        -->
                        <div id="editor">
                        {{ content }}
                        </div>
                    </div>
                {{/post}}
                </div><!--body-->
            </div><!--card-->
        </div><!--col-->
        <div class="col-md-4">
            <div class="card card card-outline card-secondary">
                <div class="card-header">
                    Publish
                </div>
                <div class="card-body">
                    <a type="button" id="submit_button" href="#" class="btn btn-primary" >
                        Submit form
                    </a>
                </div>
            </div><!--card-->
            <div class="card card card card-outline card-secondary mt-3">
                <div class="card-header">
                    Category
                </div>
                <div class="card-body">
                    <div class="form-group">
                    {{#categories}}
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value= "{{ id }}" id="category" name="category_id[]">
                            <label class="form-check-label" for="category"> {{ name }} </label>
                        </div>
                    {{/categories}}
                    </div>
                    <div class="form-group">
                        <a href="/home/categories/create" >
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i> Add new category
                        </a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">
                        Launch demo modal
                        </button>
                    </div>
                </div><!--card-body-->
            </div><!--card-->
            <div class="card card card card-outline card-secondary mt-3">
                <div class="card-header">
                    Tags
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" multiple="multiple" id="tags" name="tag_title[]">
                            {{#tags}}
                                <option>{{title}}</option>
                            {{/tags}}
                        </select>
                    </div>
                    <div class="form-group">
                        <a href="#">

                        </a>
                    </div>
                </div>
            </div><!--tag card-->
            <div class="card card card card-outline card-secondary mt-3">
                <div class="card-header">
                    Description
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="#">
                            insert description image
                        </a>
                    </div>
                </div>
            </div>
        </div><!--col-->
    </div><!--row-->
</script>
<!---->
<script id='category_modal_content_template' type='text/template'>
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <!---->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    {{#tag_list}}
                        <option>{{title}}</option>
                    {{/tag_list}}
                    </select>
                </div>
                <!---->
                <div class="form-group">
                    <label for="path">Path:</label>
                    <input type="text" class="form-control" id="path" name="path">
                </div>
                <!---->
                <div class="form-group">
                    <label for="description_txt">Description:</label>
                    <textarea class="form-control" id="description_txt" name="description_txt"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" >Save changes</button>
            </div>
        </div>
    </div>
</div>
</script>
@endverbatim
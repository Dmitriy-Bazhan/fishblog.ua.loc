<div id="changed_div">

    <div class="row" style="width: 100%; padding: 10px;">
        <div class="col-sm-12">
            <div class="white-box">
                <table id="myTable" class="table table-striped"
                       rules="all">
                    <thead>

                    <tr id="order_table"
                        data-token="{{ csrf_token() }}"
                        data-model="{{ $model }}"
                    >

                        <th id="id" data-attribute="id">id</th>
                        <th id="username" data-attribute="username">name</th>
                        <th id="email" data-attribute="email">email</th>
                        <th id="password" data-attribute="password">password</th>
                        <th id="photo_profile" data-attribute="photo_profile">Фото</th>
                        <th id="created_at" data-attribute="created_at">Дата создания</th>
                        <th id="updated_at" data-attribute="updated_at">Дата редактирования</th>
                        <th id="user_actions">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0; $i <= 9 ; $i++)
                        @if(isset($users[$i]))
                            <tr>
                                <td>{{ $users[$i]->id }}</td>
                                <td>{{ mb_substr($users[$i]->name,0 ,14) }}</td>
                                <td>{{ mb_substr($users[$i]->email, 0, 32) }}</td>
                                <td>
                                    @if(isset($users[$i]->password))
                                        is exist
                                    @else
                                        is absent
                                    @endif
                                </td>
                                <td>
                                    @if(isset($users[$i]->photo))
                                        is exist
                                    @else
                                        is absent
                                    @endif
                                </td>
                                <td>{{ mb_substr($users[$i]->created_at, 0, 10) }}</td>
                                <td>{{ mb_substr($users[$i]->updated_at, 0, 10) }}</td>
                                <td>
                                    <a href="admin/user_edit/{{ $users[$i]->id }}"><button title="Редактировать" class="badge badge-pill badge-primary"><span
                                            class="oi oi-pencil"></span></button></a>

                                    <button title="Выложенные фото" class="badge badge-pill badge-primary"><span
                                            class="oi oi-camera-slr"></span></button>

                                    <button title="Отправить сообщение" class="badge badge-pill badge-primary"><span
                                            class="oi oi-envelope-closed"></span></button>

                                    @if($users[$i]->banned)
                                        <button title="Забанить" class="badge badge-pill badge-primary"
                                                id="enable-button"><span class="oi oi-ban"></span></button>
                                    @else
                                        <button title="Отменить бан" class="badge badge-pill badge-secondary"
                                                id="enable-button"><span class="oi oi-ban"></span></button>
                                    @endif

                                    <a href="admin/user_destroy/{{ $users[$i]->id }}"><button title="Удалить пользователя" class="badge badge-pill badge-primary"><span
                                            class="oi oi-trash"></span></button></a>

                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>----</td>
                                <td>----</td>
                                <td>----</td>
                                <td>----</td>
                                <td>----</td>
                                <td>----</td>
                                <td>----</td>
                            </tr>
                        @endif
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4" id="paginator_nav_menu"
             data-token="{{ csrf_token() }}"
             data-model="{{ $model }}"
        >

            @for($i = 1;$i <= $pages; $i++)

                @if($i == $currentPage)
                    <button class="btn-primary" id="paginate_navigator" class="text-primary">{{$i}}</button>&#8195;
                @else
                    <button id="paginate_navigator" class="" data-page="{{ $i }}">{{$i}}</button>&#8195;
                @endif

            @endfor
        </div>
        <div class="col-sm-4">
        </div>
    </div>

    <script>

        $('#order_table').on('click', 'th', function () {
            var tableHeadSector = $(this).attr('data-attribute');
            $.ajax({
                method: 'post',
                url: 'table_ajax',
                dataType: 'json',
                data: {
                    _token: $(this).parent().data('token'),
                    attribute: $(this).data('attribute'),
                    model: $(this).parent().data('model')
                },
                success: function (data) {
                    $('#changed_div').html(data.response_table);
                    var test = '#' + tableHeadSector;
                    if ($(test).attr('data-attribute') == tableHeadSector + '-desc') {
                        $(test).attr('data-attribute', tableHeadSector = text.substring(0, -5));
                    } else {
                        $(test).attr('data-attribute', tableHeadSector + '-desc');
                    }
                },
                error: function (errorThrown) {
                    console.log(errorThrown);
                }
            });
        });

        $('#paginator_nav_menu').on('click', '#paginate_navigator', function () {

            $.ajax({
                method: 'post',
                url: 'table_ajax',
                dataType: 'json',
                data: {
                    _token: $(this).parent().data('token'),
                    page: $(this).data('page'),
                    model: $(this).parent().data('model')
                },
                success: function (data) {
                    $('#changed_div').html(data.response_table);
                },
                error: function (errorThrown) {
                    console.log(errorThrown);
                }
            });
        });


    </script>


</div>

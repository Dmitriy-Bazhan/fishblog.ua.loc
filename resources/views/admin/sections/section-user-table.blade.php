<div id="changed_div">

    <div class="row" style="width: 100%; padding: 10px;">
        <div class="col-sm-12">
            <div class="white-box">
                <table id="myTable" class="table table-striped" style="border: black 2px solid;margin: 10px;"
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
                        <th id="created_at" data-attribute="created_at">Дата создания</th>
                        <th id="updated_at" data-attribute="updated_at">Дата редактирования</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0; $i <= 9 ; $i++)
                        @if(isset($users[$i]))
                            <tr>
                                <td>{{ $users[$i]->id }}</td>
                                <td>{{ $users[$i]->name }}</td>
                                <td>{{ $users[$i]->email }}</td>
                                <td>{{ $users[$i]->password }}</td>
                                <td>{{ $users[$i]->created_at }}</td>
                                <td>{{ $users[$i]->updated_at }}</td>
                            </tr>
                        @else
                            <tr>
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

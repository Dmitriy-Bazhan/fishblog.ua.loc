<div id="changed_div">
    <div style="margin: 10px">
        {{ csrf_field() }}
        <ul class="nav customtab " id="language_change" role="tablist"
            data-token="{{ csrf_token() }}"
            data-page="{{ $currentPage }}"
            data-model="{{ $model }}"
            >
            @php( $allLanguage = ['UA','RU',"EN"])
            @for($i = 0; $i <= 2; $i++)
                <li>
                    @if($i == $lang)
                        <button class="btn-primary" data-lang="{{ $i }}">{{ $allLanguage[$i] }}</button>
                    @else
                        <button data-lang="{{ $i }}">{{ $allLanguage[$i] }}</button>
                    @endif
                </li>
            @endfor
        </ul>
    </div>

    <div class="row" style="width: 100%; padding: 10px;">
        <div class="col-sm-12">
            <table id="myTable" class="table table-striped" style="border: black 2px solid;margin: 10px;"
                   rules="all">
                <thead>
                <tr id="order_table"
                    data-token="{{ csrf_token() }}"
                    data-current_lang="{{ $lang }}"
                    data-model="{{ $model }}"
                    >
                    <th id="id" data-attribute="id">id</th>
                    <th id="name" data-attribute="name">name</th>
                    <th id="alias" data-attribute="alias">alias</th>
                    <th id="category" data-attribute="category">category</th>
                    <th>short-description</th>
                    <th>description</th>
                    <th id="created_at" data-attribute="created_at">Дата создания</th>
                    <th id="updated_at" data-attribute="updated_at">Дата редактирования</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 0; $i <= 9 ; $i++)
                    @if(isset($fishes[$i]))
                    <tr>
                        <td>{{ $fishes[$i]->id }}</td>
                        <td>{{ $fishes[$i]->fish_data[$lang]->name }}</td>
                        <td>{{ $fishes[$i]->alias }}</td>
                        <td>{{ $fishes[$i]->category_id }}</td>
                        <td>{{ $fishes[$i]->fish_data[$lang]->short_description }}</td>
                        <td>{{ mb_substr($fishes[$i]->fish_data[$lang]->description, 0, 45) }}</td>
                        <td>{{ $fishes[$i]->created_at }}</td>
                        <td>{{ $fishes[$i]->updated_at }}</td>
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
                            <td>----</td>
                        </tr>
                    @endif
                @endfor
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4" id="paginator_nav_menu"
             data-token="{{ csrf_token() }}"
             data-current_lang="{{ $lang }}"
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
        $('#language_change').on('click', 'button', function () {
            $.ajax({
                method: 'post',
                url: 'table_ajax',
                dataType: 'json',
                data: {
                    _token: $(this).parent().parent().data('token'),
                    lang: $(this).data('lang'),
                    page: $(this).parent().parent().data('page'),
                    model: $(this).parent().parent().data('model')
                },
                success: function (data) {
                    $('#changed_div').html(data.response_table);
                },
                error: function (errorThrown) {
                    console.log(errorThrown);
                }
            });

        });

        $('#order_table').on('click', 'th', function () {

            var tableHeadSector = $(this).attr('data-attribute');

            $.ajax({
                method: 'post',
                url: 'table_ajax',
                dataType: 'json',
                data: {
                    _token: $(this).parent().data('token'),
                    currentLang: $(this).parent().data('current_lang'),
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
                    currentLang: $(this).parent().data('current_lang'),
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

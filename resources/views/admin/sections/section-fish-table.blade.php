<div id="changed_div">

    <div class="row">

        <div class="col-11">

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

        </div>

        <div class="col">

            <a href="{{ url('admin/new_fish') }}"><h4 class="page-title" style="color: lightseagreen;">Добавить</h4></a>

        </div>

    </div>

    <div class="row" style="width: 100%; padding: 10px;">

        <div class="col-sm-12">

            <table id="myTable" class="table table-striped" style="border: black 2px solid;margin: 10px;" rules="all">

                <thead>

                <tr id="order_table"
                    data-token="{{ csrf_token() }}"
                    data-current_lang="{{ $lang }}"
                    data-model="{{ $model }}"
                >

                    <th id="id" data-attribute="id">id</th>
                    <th id="name" data-attribute="name">Название</th>
                    <th id="alias" data-attribute="alias">Псевдоним</th>
                    <th id="category" data-attribute="category">Категория</th>
                    <th id="short_description">Короткое описание</th>
                    <th id="full_description">Полное описание</th>
                    <th id="created_at" data-attribute="created_at">Дата создания</th>
                    <th id="updated_at" data-attribute="updated_at">Дата редактирования</th>
                    <th id="actions">Действие</th>

                </tr>

                </thead>

                <tbody>

                @for($i = 0; $i <= 9 ; $i++)

                    @if(isset($fishes[$i]))

                        <tr>

                            <td>{{ $fishes[$i]->id }}</td>
                            <td>{{ mb_substr($fishes[$i]->fish_data[$lang]->name,0 ,15) }}</td>
                            <td>{{ mb_substr($fishes[$i]->alias,0 ,15) }}</td>
                            <td>{{ $fishes[$i]->category_id }}</td>
                            <td>{{ mb_substr($fishes[$i]->fish_data[$lang]->short_description, 0, 32) }}</td>
                            <td>{{ mb_substr($fishes[$i]->fish_data[$lang]->description, 0, 32) }}</td>
                            <td>{{ mb_substr($fishes[$i]->created_at, 0, 10) }}</td>
                            <td>{{ mb_substr($fishes[$i]->updated_at, 0, 10) }}</td>
                            <td data-token="{{ csrf_token() }}"
                                data-current_lang="{{ $lang }}"
                                data-model="{{ $model }}"
                                data-id="{{ $fishes[$i]->id }}"
                                data-page="{{ $currentPage }}"
                            >

                                <button title="Редактировать" class="badge badge-pill badge-primary"><span
                                        class="oi oi-pencil"></span></button>

                                @if($fishes[$i]->enabled)

                                    <button title="Отключить" class="badge badge-pill badge-primary" id="enable-button">
                                        <span class="oi oi-power-standby"></span></button>
                                @else

                                    <button title="Включить" class="badge badge-pill badge-secondary"
                                            id="enable-button"><span class="oi oi-power-standby"></span></button>
                                @endif

                                <button title="Удалить" class="badge badge-pill badge-primary"><span
                                        class="oi oi-trash"></span></button>

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

        <div class="col-sm-4"></div>

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

        <div class="col-sm-4"></div>

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

        $('#myTable').on('click', '#enable-button', function () {

            $.ajax({
                method: 'post',
                url: 'table_ajax',
                dataType: 'json',
                data: {
                    _token: $(this).parent().data('token'),
                    id: $(this).parent().data('id'),
                    currentLang: $(this).parent().data('current_lang'),
                    model: $(this).parent().data('model'),
                    page: $(this).parent().data('page'),
                    action: 'action'
                },
                success: function (data) {
                    $('#changed_div').html(data.response_table);
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

@extends('layout.app')
@push('styles')
    @vite(['resources/css/dict.index.css'])
@endpush

@section('title', 'Dictionary')

@section('content')

    <div class="form-control">
        <input class="input input-alt" placeholder="type word, example.. about" id="search-text" type="text" onkeyup="tableSearch(this.value)">
        <span class="input-border input-border-alt"></span>
    </div>

    <main>
        <table id="info-table">
            <thead>
                <tr>
                    <th>
                        English word
                    </th>
                    <th>
                        Russian Word
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dict as $word)
                    <tr>
                        <td>
                            {{ $word->eng }}
                        </td>
                        <td style="font-family: Acrom">
                            {{ $word->rus }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <script>
        function tableSearch() {
            var phrase = document.getElementById('search-text');
            var table = document.getElementById('info-table');
            var regPhrase = new RegExp(phrase.value, 'i');
            var flag = false;
            for (var i = 1; i < table.rows.length; i++) {
                flag = false;
                for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
                    flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
                    if (flag) break;
                }
                if (flag) {
                    table.rows[i].style.display = "";
                } else {
                    table.rows[i].style.display = "none";
                }

            }
        }
    </script>

    {{-- @push('scripts')
        @vite(['resources/js/table.search.js'])
    @endpush --}}
@endsection

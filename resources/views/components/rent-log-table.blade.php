<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Book</th>
                <th style="text-align: center">Rent date</th>
                <th style="text-align: center">Return date</th>
                <th style="text-align: center">Actual return date</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($rentlogs as $item)
            <tr style="background-color: {{ $item->actual_return_date == null ? '' : 
                ($item->return_date < $item->actual_return_date ? '#EC7063' : '#82E0AA') }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->username }}</td> {{-- user: table name in DB --}}
                <td>{{ $item->book->book_code }} {{ $item->book->title }}</td> {{-- book: table name in DB --}}
                <td style="text-align: center">{{ $item->rent_date }}</td>
                <td style="text-align: center">{{ $item->return_date }}</td>
                <td style="text-align: center">{{ $item->actual_return_date }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
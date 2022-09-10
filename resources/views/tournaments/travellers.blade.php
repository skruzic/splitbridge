<h3>Travellers</h3>
<div class="row">
    @for ($i=0; $i < count($boards); $i++)
        <div class="col-md-4">
            <table class="table table-hover table-sm caption-top">
                <caption>Board {{ $i+1 }}</caption>
                <thead>
                    <tr>
                        <th>NS</th>
                        <th>EW</th>
                        <th>Kontr.</th>
                        <th>Izv.</th>
                        <th>At.</th>
                        <th>Št.</th>
                        <th>Rez.</th>
                        <th>MP</th>
                        <th>MP</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($boards[$i]['TRAVELLER_LINE'] as $row)
                        <tr>
                            <td>{{ $row['NS_PAIR_NUMBER'] }}</td>
                            <td>{{ $row['EW_PAIR_NUMBER'] }}</td>
                            <td>{{ $row['CONTRACT'] }}</td>
                            <td>{{ $row['PLAYED_BY'] }}</td>
                            <td>{{ $row['LEAD'] ?? '' }}</td>
                            <td>{{ $row['TRICKS'] }}</td>
                            <td>{{ $row['SCORE'] }}</td>
                            <td>{{ $row['NS_MATCH_POINTS'] }}</td>
                            <td>{{ $row['EW_MATCH_POINTS'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endfor
</div>

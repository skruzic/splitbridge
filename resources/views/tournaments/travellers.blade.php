<h3>Travellers</h3>
<div class="row">
    @for ($i=0; $i < count($data['travellers']); $i++)
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
                        <th>Rez.</th>
                        <th>NS</th>
                        <th>EW</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($data['travellers'][$i] as $row)
                        <tr>
                            <td>{{ $row['NS'] }}</td>
                            <td>{{ $row['EW'] }}</td>
                            <td>{{ $row['contract'] }}</td>
                            <td>{{ $row['declarer'] }}</td>
                            <td>{{ $row['lead'] }}</td>
                            <td>{{ !empty($row['resultNS']) ? $row['resultNS'] : -$row['resultEW'] }}</td>
                            <td>{{ $row['pointsNS'] }}</td>
                            <td>{{ $row['pointsEW'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endfor
</div>

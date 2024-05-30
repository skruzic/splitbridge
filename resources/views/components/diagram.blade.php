@props([
    'ns','nh', 'nd', 'nc',
    'ss', 'sh', 'sd', 'sc',
    'es', 'eh', 'ed', 'ec',
    'ws', 'wh', 'wd', 'wc',
    'ddn', 'dds', 'dde', 'ddw',
])


<table>
    <tbody>
        <tr>
            <td class="w-32"></td>
            <td class="w-32">
                <x-diagram.suit suit="S" :cards="$ns"/>
                <x-diagram.suit suit="H" :cards="$nh"/>
                <x-diagram.suit suit="D" :cards="$nd"/>
                <x-diagram.suit suit="C" :cards="$nc"/>
            </td>
            <td class="w-32"></td>
        </tr>
        <tr>
            <td>
                <x-diagram.suit suit="S" :cards="$ws"/>
                <x-diagram.suit suit="H" :cards="$wh"/>
                <x-diagram.suit suit="D" :cards="$wd"/>
                <x-diagram.suit suit="C" :cards="$wc"/>
            </td>
            <td></td>
            <td>
                <x-diagram.suit suit="S" :cards="$es"/>
                <x-diagram.suit suit="H" :cards="$eh"/>
                <x-diagram.suit suit="D" :cards="$ed"/>
                <x-diagram.suit suit="C" :cards="$ec"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <x-diagram.suit suit="S" :cards="$ss"/>
                <x-diagram.suit suit="H" :cards="$sh"/>
                <x-diagram.suit suit="D" :cards="$sd"/>
                <x-diagram.suit suit="C" :cards="$sc"/>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>

@props([
    'board',
    /*'ns','nh', 'nd', 'nc',
    'ss', 'sh', 'sd', 'sc',
    'es', 'eh', 'ed', 'ec',
    'ws', 'wh', 'wd', 'wc',
    'ddn', 'dds', 'dde', 'ddw',*/
])


<table>
    <tbody>
        <tr>
            <td class="w-32"></td>
            <td class="w-32">
                <x-diagram.suit suit="S" :cards="$board['ns']"/>
                <x-diagram.suit suit="H" :cards="$board['nh']"/>
                <x-diagram.suit suit="D" :cards="$board['nd']"/>
                <x-diagram.suit suit="C" :cards="$board['nc']"/>
            </td>
            <td class="w-32"></td>
        </tr>
        <tr>
            <td>
                <x-diagram.suit suit="S" :cards="$board['ws']"/>
                <x-diagram.suit suit="H" :cards="$board['wh']"/>
                <x-diagram.suit suit="D" :cards="$board['wd']"/>
                <x-diagram.suit suit="C" :cards="$board['wc']"/>
            </td>
            <td></td>
            <td>
                <x-diagram.suit suit="S" :cards="$board['es']"/>
                <x-diagram.suit suit="H" :cards="$board['eh']"/>
                <x-diagram.suit suit="D" :cards="$board['ed']"/>
                <x-diagram.suit suit="C" :cards="$board['ec']"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <x-diagram.suit suit="S" :cards="$board['ss']"/>
                <x-diagram.suit suit="H" :cards="$board['sh']"/>
                <x-diagram.suit suit="D" :cards="$board['sd']"/>
                <x-diagram.suit suit="C" :cards="$board['sc']"/>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>

<thead>
    <tr>
        <th  align="center">nik</th>
        <th  align="center">nama</th>
        <th  align="center">jabatan</th>
        <th  align="center">cabang</th>
        <th  align="center">tanggal</th>
        <th  align="center">1</th>
        <th  align="center">2</th>
        <th  align="center">3</th>
        <th  align="center">4</th>
        <th  align="center">5</th>
        <th  align="center">6</th>
        <th  align="center">7</th>
        <th  align="center">8</th>
        <th  align="center">9</th>
        <th  align="center">10</th>
        <th  align="center">11</th>
        <th  align="center">12</th>
        <th  align="center">13</th>
        <th  align="center">14</th>
        <th  align="center">15</th>
        <th  align="center">16</th>
        <th  align="center">17</th>
        <th  align="center">18</th>
        <th  align="center">19</th>
        <th  align="center">20</th>
        <th  align="center">21</th>
        <th  align="center">22</th>
        <th  align="center">23</th>
        <th  align="center">24</th>
        <th  align="center">25</th>
        <th  align="center">26</th>
        <th  align="center">27</th>
        <th  align="center">28</th>
        <th  align="center">29</th>
        <th  align="center">30</th>
        <th  align="center">31</th>
        {{-- <th  align="center">total hadir</th>
        <th  align="center">total alpha</th>
        <th  align="center">total izin</th>
        <th  align="center">total cuti</th> --}}
    </tr>
</thead>
<tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->nik }}</td>
            <td>{{ $user->nama_lengkap }}</td>
            <td>{{ $user->jabatan->jabatan }}</td>
            <td>{{ $user->cabang->cabang }}</td>
            <td>{{ $tanggal }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            {{-- <td></td>
            <td></td>
            <td></td>
            <td></td> --}}
        </tr>
    @endforeach
</tbody>

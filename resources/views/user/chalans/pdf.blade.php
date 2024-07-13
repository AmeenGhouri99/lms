<!DOCTYPE html>
<html>

<head>
    <title>Challan Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        .row {
            display: flex;
            flex-wrap: nowrap;
            /* Ensure columns stay in a single row */
            width: 100%;
        }

        .col-4 {
            width: 25%;
            padding: 0;
            box-sizing: border-box;
        }

        .challan-section {
            width: 100%;
            border: 0.5px solid black;
            margin-bottom: -10px;
            box-sizing: border-box;
        }

        .challan-header {
            text-align: center;
            margin-bottom: 1px;
        }

        .challan-table {
            width: 100%;
            border-collapse: collapse;
        }

        .challan-table th,
        .challan-table td {
            border: 0.5px solid black;
            padding: 4px;
            text-align: left;
            font-size: 8px;
        }

        .challan-table th {
            background-color: #f2f2f2;
        }

        .challan-info {
            width: 100%;
            margin-bottom: 0px;
            font-size: 8px;
        }

        .challan-info td {
            padding: 2px 4px;
        }

        .bold {
            font-weight: bold;
        }

        .center {
            text-align: center;
        }

        .small {
            font-size: 7px;
        }

        .signature {
            margin-top: 10px;
            text-align: center;
            font-size: 8px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            @foreach (['Student Copy', 'Department Copy', 'Treasurer Copy', 'Bank Copy'] as $copyType)
                <td>
                    <div class="challan-section">
                        <table class="challan-info">
                            <tr>
                                <td class="bold">Acc. No: </td>
                                <td>8900875503</td>
                                <td class="bold">Challan No: </td>
                                <td>{{ $challan_no }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="center">
                                    Bank Al Habib Limited
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="center">
                                    <span class="bold">Branch:</span> Mumtazabad Multan (1266)
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="center">
                                    For Admission Fee/Tuition Fee
                                </td>
                            </tr>
                        </table>
                        <div class="challan-header">
                            <h4>MNS-UET, Multan</h4>
                            <p class="small">{{ $copyType }}</p>
                        </div>
                        <table class="challan-info">
                            <tr>
                                <td class="bold">Student Name: </td>
                                <td>{{ $user->personalInformation->candidate_name }}</td>
                            </tr>
                            <tr>
                                <td class="bold">Program Type: </td>
                                <td>
                                    @foreach ($user->admission as $program)
                                        @foreach ($program->program as $applied_program)
                                            {{ $applied_program->program->parent->name }}
                                        @break
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td class="bold">Applied Programs: </td>
                            <td>
                                @foreach ($user->admission as $program)
                                    @foreach ($program->program as $applied_program)
                                        {{ $applied_program->program->name }},
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
                    </table>
                    <table class="challan-table">
                        <tr>
                            <th>Sr. No.</th>
                            <th>Description</th>
                            <th>Amount/ RS.</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Bonafied Certificate fee</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>English Proficiency</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Degree Verification fee</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Degree Fee</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>CHARACTER CERTIFICATE</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>DMC Incomplete Certificate</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Admission FEE</td>
                            <td>{{ settings('admission_fee') }}</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Provisional Certificate</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Subject Supplementary fee/SITIN CASUAL</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Recommendation Letter Fee</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Equivalence Certificate</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Thesis late fee</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>NOC</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Class Absence Fine / Attendance Shortage Fine</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>LIBRARY CARD FEE/FINE</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>HOPE CERTIFICATE</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th colspan="2">Total RS.</th>
                            <th>{{ settings('admission_fee') }}</th>
                        </tr>
                    </table>
                    <div class="signature">
                        <p>Verified by Dues Section</p>
                        <p>MNS UET MULTAN</p>
                    </div>
                </div>
            </td>
        @endforeach
    </tr>
</table>
</div>
</body>

</html>

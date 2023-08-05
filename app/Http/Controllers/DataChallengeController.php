<?php

namespace App\Http\Controllers;

use App\Models\ChallengeData;
use Illuminate\Http\Request;

class DataChallengeController extends Controller
{
    //index
    public function index()
    {
        $data['challenge_data'] = ChallengeData::all();
        return view('index', $data);
    }
    //cal
    public function create()
    {
        // HIER + GIBT + ES = NEUES
        // H=? I=? E=? R=? G=? B=? T=? S=? N=? U=?
        // R +T = 10 เพราะ 10+S = S ทด 1 
        // E + B = 9
        // H + G >= 10
        // E < 7
        // I < 5
        // H,G,E,N != 0
        // U = เลขคี่

        $S = [0, 2, 3, 4, 5, 6, 7, 8, 9];
        $N = [1]; //เพราะว่า ค่าตัวเลข 1-9 2 จำนวน บวกกันมีค่าไม่เกิน 20 แล้วเงื่อนไขคือไม่มีตัวเลข 0 นำหน้า
        $R = [2, 3, 4, 6, 7, 8];
        $T = [8, 7, 6, 4, 3, 2];
        $E = [0, 2, 3, 4, 5, 6, 7];
        $B = [7, 6, 5, 4, 3, 2, 0];
        $I = [2, 3, 4];
        $U = [3, 5, 7, 9];
        $H = [2, 3, 4, 6, 7, 8, 9];
        $G = [9, 8, 7, 6, 4, 3, 2];
        $arr_point = [];
        $arr_answer = [];
        for ($r = 0; $r < count($R); $r++) {
            for ($t = 0; $t < count($T); $t++) {
                if ($R[$r] + $T[$t] == '10') {
                    for ($e = 0; $e < count($E); $e++) {
                        for ($b = 0; $b < count($B); $b++) {
                            if ($E[$e] + $B[$b] == '9') {
                                for ($i = 0; $i < count($I); $i++) {
                                    for ($u = 0; $u < count($U); $u++) {
                                        for ($h = 0; $h < count($H); $h++) {
                                            for ($g = 0; $g < count($G); $g++) {
                                                $arr_1 = [
                                                    "N" => 1,
                                                    "R" => $R[$r],
                                                    "T" => $T[$t],
                                                    "E" => $E[$e],
                                                    "B" => $B[$b],
                                                    "I" => $I[$i],
                                                    "U" => $U[$u],
                                                    "H" => $H[$h],
                                                    "G" => $G[$g],
                                                ];
                                                $checkqueArr_1 = array_unique($arr_1); // ตรวจสอบค่าที่ซ้ำกัน
                                                if (count($arr_1) == count($checkqueArr_1)) {
                                                    for ($s = 0; $s < count($S); $s++) {
                                                        $arr_2 = [
                                                            "N" => 1,
                                                            "R" => $R[$r],
                                                            "T" => $T[$t],
                                                            "E" => $E[$e],
                                                            "B" => $B[$b],
                                                            "I" => $I[$i],
                                                            "U" => $U[$u],
                                                            "H" => $H[$h],
                                                            "G" => $G[$g],
                                                            "S" => $S[$s],
                                                        ];
                                                        $checkqueArr_2 = array_unique($arr_2); // ตรวจสอบค่าที่ซ้ำกัน
                                                        if (count($arr_2) == count($checkqueArr_2)) {
                                                            array_push($arr_point, $arr_2);
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            } else {
                                continue;
                            }
                        }
                    }
                } else {
                    continue;
                }
            }
        }
        for ($round = 0; $round < count($arr_point); $round++) {
            $formula  = intval($arr_point[$round]['H'] . $arr_point[$round]['I'] . $arr_point[$round]['E'] . $arr_point[$round]['R']) + intval($arr_point[$round]['G'] . $arr_point[$round]['I'] . $arr_point[$round]['B'] . $arr_point[$round]['T']) + intval($arr_point[$round]['E'] . $arr_point[$round]['S']);

            $result = $arr_point[$round]['N'] . $arr_point[$round]['E'] . $arr_point[$round]['U'] . $arr_point[$round]['E'] . $arr_point[$round]['S'];
            $expression_1 = $arr_point[$round]['H'] . $arr_point[$round]['I'] . $arr_point[$round]['E'] . $arr_point[$round]['R'];
            $expression_2 = $arr_point[$round]['G'] . $arr_point[$round]['I'] . $arr_point[$round]['B'] . $arr_point[$round]['T'];
            $expression_3 = $arr_point[$round]['E'] . $arr_point[$round]['S'];

            if ($formula == $result) {
                $output = new ChallengeData;
                $output->val_of_H = $arr_point[$round]['H'];
                $output->val_of_I = $arr_point[$round]['I'];
                $output->val_of_E = $arr_point[$round]['E'];
                $output->val_of_R = $arr_point[$round]['R'];
                $output->val_of_G = $arr_point[$round]['G'];
                $output->val_of_I = $arr_point[$round]['I'];
                $output->val_of_B = $arr_point[$round]['B'];
                $output->val_of_T = $arr_point[$round]['T'];
                $output->val_of_E = $arr_point[$round]['E'];
                $output->val_of_S = $arr_point[$round]['S'];
                $output->expression_1 = $expression_1;
                $output->expression_2 = $expression_2;
                $output->expression_3 = $expression_3;
                $output->answer = $result;
                $output->save();
            }
        }
        return redirect()->route('index')->with('success', 'Good');
    }



    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'detail' => 'required'
    //     ]);
    //     $output = new ChallengeData;
    //     $output->detail = $request->detail;
    //     $output->answer = $request->answer;
    //     $output->save();
    //     return redirect()->route('index')->with('success','Good');
    // }
}

<?php
namespace app\PXSQ\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\PXSQ\controller\CodeMachine;

class SubjectMng extends controller{

    private $CM;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->CM = new CodeMachine();
    }

    public function showSubjectMng(){
        return view('SubjectMng');
    }

    public function showClassMng(){
         return view('SubjectClassMng');
    }

    public function AddSubjectClass(){
        $SubjectClassName = input('SubjectClassName');
        if(empty($SubjectClassName)){
            return '清输入题目类别名称!';
        }

        db()->query('INSERT INTO SubjectClass(SubjectClassCode,SubjectClassName) VALUES(?,?)'
            ,[$this->CM->GetAndIncCurCode('SCC'),$SubjectClassName]);

        return 'OK';
    }

    public function GetSubjectClassList(){
        $rows = db()->query('SELECT * FROM SubjectClass');
        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

    public function  AddSubject(){

        $data['SubjectClassCode'] = input('SubjectClassCode');
        $data['SubjectCode'] = $this->CM->GetCurCode('SC');
        $data['SubjectTitle'] = input('SubjectTitle');
        $data['AnswerCnt'] = input('AnswerCnt');
        $data['Answer1'] = input('Answer1');
        $data['Answer2'] = input('Answer2');
        $data['Answer3'] = input('Answer3');
        $data['Answer4'] = input('Answer4');
        $data['Answer5'] = input('Answer5');
        $data['Answer6'] = input('Answer6');
        $data['RightAnswer'] = implode('', array_unique(str_split(input('RightAnswer'))));
        $data['SubjectType'] = input('SubjectType');

        if(empty($data['AnswerCnt'])){
            return '必须选择选项个数(大于2)';
        }

        for($i=6;$i>$data['AnswerCnt'];$i--){
            unset($data['Answer'.$i]);
        }

        foreach ($data as $d){
            if(empty($d)){
                return '输入要素不完整!';
            }
        }


        if(!in_array($data['SubjectType'],['单选','多选'])){
            return '题目类型错误';
        }

        if($data['SubjectType']=='单选'){
            if(1!=strlen($data['RightAnswer'])){
                return '单选题的正确答案只能有一个';
            }else{
                if(!(ord('A')<ord($data['RightAnswer'])
                    && (ord('A')+$data['AnswerCnt']>ord($data['RightAnswer'])))){
                    return '单选题答案设置错误!';
                }
            }
        }else{
            if(strlen($data['RightAnswer'])<2 || strlen($data['RightAnswer']) > $data['AnswerCnt']){
                return '多选题答案设置错误!';
            }else{
                for($i=0;$i<strlen($data['RightAnswer']);$i++){
                    $d = $data['RightAnswer'][$i];
                    if(!(ord('A')<ord($d)
                        && (ord('A')+$data['AnswerCnt']>ord($d)))){
                        return '多选题答案设置错误!';
                    }
                }
            }
        }

        $rows = db()->query('SELECT * FROM SubjectList WHERE SubjectTitle = ?',[$data['SubjectTitle']]);
        if(!empty($rows)){
            return '该题目已经存在!';
        }

        $Cnt =  db('SubjectList')->insert($data);
        if($Cnt>0){
            $this->CM->IncCurCode('SC');
            return 'OK';
        }

    }


    public function SubjectQry(){
        $SubjectClassCode = input('SubjectClassCode');
        $SubjectType = input('SubjectType');
        $SubjectTitle = input('SubjectTitle');

        $Sql = 'SELECT * FROM SubjectList  A JOIN SubjectClass B ON A.SubjectClassCode = B.SubjectClassCode WHERE 1=1 ';
        $paraArr = [];
        if(!empty($SubjectClassCode)){
            $paraArr[] = $SubjectClassCode;
            $Sql.= ' AND A.SubjectClassCode = ?';
        }

        if(!empty($SubjectType)){
            $paraArr[] = $SubjectType;
            $Sql.= ' AND A.SubjectType = ?';
        }

        if(!empty($SubjectTitle)){
            $paraArr[] = '%'.$SubjectTitle.'%';
            $Sql.= ' AND A.SubjectTitle like ?';
        }

        $rows = db()->query($Sql,$paraArr);

        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

    public function showSubjectQry(){
        return view('SubjectQry');
    }

    public function test()
    {

    }

}
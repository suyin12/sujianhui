<?php
/**
 * Auth: sjh
 * Created: 2018/6/27 14:40
 */
namespace service;

class Calendar{
    private $year;
    private $month;
    private $start_weekday;        //当月的第一天对应的是周几，作为当月开始遍历日期的开始
    private $days;                 //当前月总天数

    //构造方法，用来初使化一些日期属性
    function __construct(){
        //如果用户没有设置所份数，则使用当前系统时间的年份
        $this->year = isset($_GET["year"]) ? $_GET["year"] : date("Y");
        //如果用户没有设置月份数，则使用当前系统时间的月份
        $this->month = isset($_GET["month"]) ? $_GET["month"] : date("m");
        //通过具体的年份和月份，利用date()函数的w参数获取当月第一天对应的是周几
        $this->start_weekday = date("w",mktime(0,0,0,$this->month,1,$this->year));
        //通过具体的年份和月份，利用date()函数的t参数获取当月的天数
        $this->days = date("t",mktime(0,0,0,$this->month,1,$this->year));
    }

    //魔术方法用于打印整个日历
    function __toString(){
        $out = '';
        $out .='<table>';
        $out .=$this->chageDate();        //调用内部私有方法用于用户自己设置日期
        $out .=$this->weeksList();        //调用内部私有方法打印周列表
        $out .=$this->daysList();         //调用内部私有方法打印日列表
        $out .='</table>';

        return $out;          //返回整个日历输需要的全部字符串
    }

    //内部调用的私有方法，用于输出周列表
    private function weeksList(){
        $out = '';
        $week = array('日','一','二','三','四','五','六');
        $out .= '<tr>';
        for ($i = 0; $i<count($week); $i++)
            $out .= '<th class="fontb">'.$week[$i].'</th>';         //第一行以表格<th>输出周列表
        $out .= '</tr>';
        return $out;          //返回周列表字符串
    }

    //内部调用的私有方法，用于输出周列表
    private function daysList(){
        $out = '';
        $out .= '<tr>';
        //输出空格（当前一月第一天前面要空出来）
        for ($j = 0; $j<$this->start_weekday; $j++)
            $out .= '<td> </td>';

        //将当月的所有日期循环遍历出来，如果是当前日期，为其设置深色背景
        for ($k = 1; $k<=$this->days; $k++){
            $j++;

            if ($k == date('d')){
                $out .= '<td class="fontb">'.$k.'</td>';
            }else {
                $out .='<td>'.$k.'</td>';
            }

            if ($j%7 == 0)                   //每输出7个日期，就换一行
                $out .= '</tr><tr>';        //输出行结束和下一行开始
        }

        //遍历完日期后，将后面用空格补齐
        while ($j%7 !== 0){
            $out .= '<td> </td>';
            $j++;
        }

        $out .= '</tr>';
        return $out;                      //返回当月日期列表
    }

    //内部调用的私有方法，用于处理当前年份的上一年需要的数据
    private function prevYear($year,$month){
        $year = $year-1;          //上一年是当前年减1

        if($year < 1970)          //年份设置最小值是1970年
            $year = 1970;

        return "year={$year}&month={$month}";        //返回最终的年份和月份设置参数
    }

    //内部调用的私有方法，用于处理当前月份的上一月份需要的数据
    private function prevMonth($year,$month){

        if ($month == 1){
            $year = $year-1;          //上一年是当前年减1

            if($year < 1970)          //年份设置最小值是1970年
                $year =1970;
            $month = 12;           //如果是1月，上一月就是上一年的最后一月
        }else {
            $month--;              //上一月份是当前月减1
        }
        return "year={$year}&month={$month}";        //返回最终的年份和月份设置参数
    }

    //内部调用的私有方法，用于处理当前年份的下一年份的数据
    private function nextYear($year,$month){
        $year = $year+1;          //下一年是当前年加1

        if($year > 2038)          //年份设置最大值是2038年
            $year =2038;

        return "year={$year}&month={$month}";        //返回最终的年份和月份设置参数
    }

    //内部调用的私有方法，用于处理当前月份的下一月份需要的数据
    private function nextMonth($year,$month){

        if ($month == 12){
            $year++;

            if($year > 2038)         //年份设置最大值是2038年
                $year =2038;
            $month = 1;           //如果是1月，上一月就是上一年的最后一月
        }else {
            $month++;              //上一月份是当前月减1
        }
        return "year={$year}&month={$month}";        //返回最终的年份和月份设置参数
    }

    //内部调用的私有方法，用于用户操作去调整年份和月份的设置
    private function chageDate($url=""){
        $out = '';
        $out .= '<tr>';
        $out .= '<td><a href="'.$url.'?'.$this->prevYear($this->year,$this->month).'">'.'<<'.'</a></td>';
        $out .= '<td><a href="'.$url.'?'.$this->prevMonth($this->year,$this->month).'">'.'<<'.'</a></td>';

        $out .= '<td colspan="3">';
        $out .= '<form>';
        $out .= '<select name="year" onchange="window.location=\''.$url.
            '?year=\'+this.options[selectedIndex].value+\'&month='.$this->month.'\'">';
        for ($sy=1970; $sy<=2038;$sy++){
            $selected = ($sy == $this->year) ? "selected" : "";
            $out .= '<option '.$selected.' value="'.$sy.'">'.$sy.'</option>';
        }
        $out .= '</select>';
        $out .= '<select name="month" onchange="window.location=\''.$url.
            '?year='.$this->year.'&month=\'+this.options[selectedIndex].value">';
        for ($sm=1; $sm<=12;$sm++){
            $selected1 = ($sm == $this->month) ? "selected" : "";
            $out .= '<option '.$selected1.' value="'.$sm.'">'.$sm.'</option>';
        }
        $out .= '</select>';
        $out .= '</form>';
        $out .= '</td>';

        $out .= '<td><a href="'.$url.'?'.$this->nextYear($this->year,$this->month).'">'.'>>'.'</a></td>';
        $out .= '<td><a href="'.$url.'?'.$this->nextMonth($this->year,$this->month).'">'.'>>'.'</a></td>';
        $out .= '</tr>';
        return $out;                //返回日期表单
    }
}

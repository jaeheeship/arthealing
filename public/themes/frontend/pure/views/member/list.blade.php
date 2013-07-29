@extends('layouts/pureLayout') 
<?php
Asset::queue('MemberController','js/MemberController.js','jquery') ; 
?>
@section('content')
<div class="container"> 
    <div class="row">
        <h2 style="text-align:center">회원목록</h2>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <form method="get" id="search_form" action="/user/list" class="form-inline">
            <input class="col-lg-2" name="search_email" placeholder="Input search email address">
            <select class="col-lg-3" name="search_group">
                <option value="">모두</option>
                <?php foreach($result['groups'] as $key => $group) :?>
                <option <?php if($result['selected_group'] == $group->id){echo 'selected'; }?> value="<?=$group->id;?>"><?=$group->name;?></option>
                <?php endforeach;?>
            </select> 
        </form>
    </div>
    <div class="row">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>번호</th>
                    <th>이메일</th>
                    <th>이름</th>
                    <th>생성날짜</th>
                    <th>기능</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($result['users'])){ ?>
                <tr class="text-center">
                    <td colspan="5">회원이 없습니다.</td>
                </tr>
                <?php }else{ ?>
                <?php foreach($result['users'] as $key => $user) :?>
                <tr>  
                    <td><?=$user->id;?></td>
                    <td><a href="/member/view/<?=$user->id;?>"><?=$user->email;?></a></td>
                    <td><?=$user->first_name;?></td>
                    <td><?=$user->created_at;?></td>
                    <td><a class="btn btn-danger" href="/member/delete/<?=$user->id;?>">삭제</a></td>
                </tr>  
                <?php endforeach;?>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
@stop

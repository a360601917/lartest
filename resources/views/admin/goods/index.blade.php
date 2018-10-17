@extends('admin.layouts.app')
@section('title', '商品列表')

@section('content')

<div class="right_wrap">
  <div class="right_content">

    <div class="projectlistwrap"  >

      <div class="projectlist" style="display: block">
        <p class="product_custom_table_title">商品定义表</p>
        <p class="searchbox">
          <input type="text" placeholder="项目编号/关键词" style="margin: 0px 0px 35px">
        </p>
        <table class="tab-content" border="0" cellpadding="0" cellspacing="0">
          <thead>
            <tr>

              <th>商品ID</th>
              <th>项目名称</th>
              <th>类别</th>
              <th>SKU</th>
              <th>商家商品编码</th>
              <th>生成项目</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <tr>

              <td><span></span>952</td>
              <td>
                <span  class="productimg"><img src="/img/admin/user.jpg" alt=""></span>
                Bio Island 成人液体乳钙胶囊 150粒
              </td>
              <td><span>保健</span></td>
              <td><span>AUBMAPT00100300</span></td>
              <td><span>010B001</span></td>
              <td>
                <span>
                  <input type="checkbox" id="create1" class="create1"/>
                  <label for="create1" class="create">

                  </label>
                </span>
              </td>
              <td><span>编辑｜删除</span></td>
            </tr>
            <tr>

              <td><span></span>952</td>
              <td>
                <span  class="productimg"><img src="/img/admin/user.jpg" alt=""></span>
                Bio Island 成人液体乳钙胶囊 150粒
              </td>
              <td><span>保健</span></td>
              <td><span>AUBMAPT00100300</span></td>
              <td><span>010B001</span></td>
              <td>
                <span>
                  <input type="checkbox" id="create2" class="create1"/>
                  <label for="create2" class="create"></label>
                </span>
              </td>
              <td><span>编辑｜删除</span></td>
            </tr>
            <tr>

              <td><span></span>952</td>
              <td>
                <span  class="productimg"><img src="/img/admin/user.jpg" alt=""></span>
                Bio Island 成人液体乳钙胶囊 150粒
              </td>
              <td><span>保健</span></td>
              <td><span>AUBMAPT00100300</span></td>
              <td><span>010B001</span></td>
              <td>
                <span>
                  <input type="checkbox" id="create3" class="create1"/>
                  <label for="create3" class="create">
                  </label>
                </span>
              </td>
              <td><span>编辑｜删除</span></td>
            </tr>
            <tr>

              <td><span></span>952</td>
              <td>
                <span  class="productimg"><img src="/img/admin/user.jpg" alt=""></span>
                Bio Island 成人液体乳钙胶囊 150粒
              </td>
              <td><span>保健</span></td>
              <td><span>AUBMAPT00100300</span></td>
              <td><span>010B001</span></td>
              <td>
                <span>
                  <input type="checkbox" id="create4" class="create1"/>
                  <label for="create4" class="create">
                  </label>
                </span>
              </td>
              <td><span>编辑｜删除</span></td>
            </tr>
          </tbody>
        </table>
        <div class="pagecode">
          <p>
            <a href="">首页</a>
            <span>
              <a href="">1</a>
              <a href="">2</a>
              <a href="">3</a>
              <a href="">...</a>
              <a href="">11</a>
            </span>
            <a href="">末页</a>
          </p>
        </div>

      </div>





    </div>

  </div>
</div>
@endsection;
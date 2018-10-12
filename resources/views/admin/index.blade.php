<div class="right_wrap">
  <div class="right_content">
    <div class="first_nav_list">
      <ul>
        <li>
          <i></i>
          <p>
            <span>项目总数</span>
            <span>944个</span>
          </p>
        </li>
        <li>
          <i></i>
          <p>
            <span>订单总数</span>
            <span>123个</span>
          </p>
        </li>
      </ul>
      <ul>
        <li>
          <i></i>
          <p>
            <span>商户总数</span>
            <span>29个</span>
          </p>
        </li>
        <li>
          <i></i>
          <p>
            <span>新消息</span>
            <span>2个</span>
          </p>
        </li>
      </ul>

    </div>
    <ul class="second_nav_list">
      <li>
        <p class="order_form_title">最新订单</p>
        <div class="order_form_wrap">
          <table border="0" class="order_form" cellspacing="0" >
            <thead>
              <tr>
                <th>ID</th>
                <th>店铺(ID/域名)</th>
                <th>项目</th>
                <th>用户</th>
                <th>数量</th>
                <th>总款</th>
                <th>支付</th>
                <th>递送</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>89 cddwarehouse.store</td>
                <td>2439(Jurlique 茱莉蔻 高效防晒霜SPF 40 PA +++ 100ml（1件）)</td>
                <td>cdd@qq.com cdd</td>
                <td>1</td>
                <td>￥212.73</td>
                <td>￥212.73</td>
                <td>快递</td>
                <td>详情</td>
              </tr>
              <tr>
                <td>2</td>
                <td>89 cddwarehouse.store</td>
                <td>2439(Jurlique 茱莉蔻 高效防晒霜SPF 40 PA +++ 100ml（1件）)</td>
                <td>cdd@qq.com cdd</td>
                <td>1</td>
                <td>￥212.73</td>
                <td>￥212.73</td>
                <td>快递</td>
                <td>详情</td>
              </tr>
              <tr>
                <td>3</td>
                <td>89 cddwarehouse.store</td>
                <td>2439(Jurlique 茱莉蔻 高效防晒霜SPF 40 PA +++ 100ml（1件）)</td>
                <td>cdd@qq.com cdd</td>
                <td>1</td>
                <td>￥212.73</td>
                <td>￥212.73</td>
                <td>快递</td>
                <td>详情</td>
              </tr>

            </tbody>

          </table>
        </div>
        <a href="" class="check_order">查看全部订单></a>
      </li>
      <li>
        <p class="order_form_title">最新订单</p>
        <div class="order_form_wrap">
          <table border="0" class="order_form" cellspacing="0" >
            <thead>
              <tr>
                <th>商品ID</th>
                <th></th>
                <th>项目</th>
                <th>根成本价</th>
                <th>销量</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td><img src="img/user.jpg" alt=""></td>
                <td>2439(Jurlique 茱莉蔻 高效防晒霜SPF 40 PA +++ 100ml（1件）)</td>
                <td style="text-align: center">$57.00</td>
                <td>1</td>

              </tr>
              <tr>
                <td>2</td>
                <td><img src="img/user.jpg" alt=""></td>
                <td>2439(Jurlique 茱莉蔻 高效防晒霜SPF 40 PA +++ 100ml（1件）)</td>
                <td style="text-align: center">$57.00</td>
                <td>1</td>

              </tr>
              <tr>
                <td>3</td>
                <td><img src="img/user.jpg" alt=""></td>
                <td>2439(Jurlique 茱莉蔻 高效防晒霜SPF 40 PA +++ 100ml（1件）)</td>
                <td style="text-align: center">$57.00</td>
                <td>1</td>

              </tr>

            </tbody>

          </table>
        </div>
        <a href="" class="check_order">查看完整榜单></a>
      </li>
    </ul>
    <ul class="third_nav_list">
      <li>
        <div class="order_form_title">
          <span>店铺销量对比</span>
          <select name="" id="" class="option_wrap">
            <option value="admin">过去一周</option>
            <option value="super admin">过去两周</option>
          </select>
        </div>
        <div class="ct-chart1 ct-golden-section"></div>

        <a href="" class="check_order">查看详细报表></a>
      </li>
      <li>
        <div class="order_form_title">
          <span>人民币利润</span>
        </div>
        <div class="ct-chart ct-golden-section"></div>

        <a href="" class="check_order">查看详细报表></a>
      </li>
    </ul>
  </div>
</div>
<script>


  //Chartist图表
  new Chartist.Line('.ct-chart', {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
    series: [
      [0, 1, 2.5, 4, 5],
      [2, 5, 3, 2, 3],
      [0, 1, 3.5, 6, 5]
    ]
  }, {
    fullWidth: true,
    chartPadding: {
      right: 40,
      left: 40
    }
  });
  new Chartist.Bar('.ct-chart1', {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
    series: [
      [5, 4, 3, 7, 5, 10, 3],
      [3, 2, 9, 5, 4, 6, 4]
    ]
  }, {
    axisX: {
      // On the x-axis start means top and end means bottom
      position: 'start'
    },
    axisY: {
      // On the y-axis start means left and end means right
      position: 'end'
    },
    fullWidth: true,
    chartPadding: {
      right: 40,
      left: 40
    }
  });

</script>
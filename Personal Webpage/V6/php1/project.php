<!doctype html>
<html ng-app="myApp" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.8/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.8/angular-route.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-animate.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-sanitize.js"></script>
    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-2.4.0.js"></script>
    <script src="chartist.min.js"></script>
    <script src="Chart.min.js"></script>
    <script src="jquery-3.1.1.min.js"></script>
    <script src="angular-chart.js"></script>
    <link rel="stylesheet" href="chartlist.min.css">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-touch.js"></script>
    <script src="http://ui-grid.info/release/ui-grid.js"></script>
    <link rel="stylesheet" href="http://ui-grid.info/release/ui-grid.css" type="text/css">
</head>
<body>


<!--view-->

<nav ng-controller="menuController" class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../../index.html"> Jerry's Angular SPA</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href= {{a}}> {{aName}}</a></li>
            <li class="dropdown" >
                <a class="dropdown-toggle" data-toggle="dropdown" href= {{b}}> {{bName}}<span class="caret"></span> </a>

                <ul class="dropdown-menu">
                    <li><a href= {{b}}> {{bName}}</a></li>
                    <li><a href= {{ba}}> {{baName}}</a></li>
                    <li><a href= {{bb}}> {{bbName}}</a></li>
                </ul>
            </li>
            <li><a href={{c}}> {{cName}}</a></li>
            <li><a href={{d}}> {{dName}}</a></li>
        </ul>
    </div>
</nav>


<div class='container-fluid'>
    <div ng-view></div>
</div>


<!--home-->
<script type="text/ng-template" id="home.html">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1> {{name}} </h1>
            <p>
                Hello,
                <a href="#" tooltip-animation="false" uib-tooltip="Built via Angular 1.58!">This single page web
                    application</a>
                is used to improve my angularJS and bootstrap skills.

                <li>Home page implements a few selected features found on https://angular-ui.github.io/bootstrap/.
                <li>Page 1-1,1-2,1-3 uses $HTTP to GET JSON data and other functions.
                <li>Page 2 has some form input fields and other showcases.
            <li>Page 3 is a small angular app.
            </p>
            <br>
            <div>
                <pre>Date is: <em>{{dt | date:'fullDate' }}</em></pre>
                <pre class="alert alert-info">Time is: <em>{{mytime  | date:'shortTime' }}</em></pre>
                <br>
                <div style="display:inline-block; min-height:290px;">
                    <div uib-datepicker ng-model="dt" class="well well-sm" datepicker-options="options"></div>
                </div>
                <div uib-timepicker ng-model="mytime"></div>
            </div>


        </div>
    </div>
</script>


<!--page1-->
<script type="text/ng-template" id="pages/page1.html">
    <div class="row">
        <div class="col-sm-8">
            <h1>{{name}}
                <button class="btn btn-primary" ng-click="showText()">{{buttonText}}</button>
            </h1>
            <div>
                <p ng-show='show'>
                    <code>
                        {{content}}
                    </code>

                    <br><br>
                    <a href='https://raw.githubusercontent.com/weiyikong/fun/master/courses.json'>
                        <button class="btn btn-default">Go to Source</button>
                    </a>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div ng-show="showcheckbox">
                <h1>
                    <input type="button" class="btn btn-default" ng-click="showCharts()" value="Show Charts">
                </h1>
            </div>
        </div>
    </div>

    <!--table-->
    <div class="row">
        <hr>
        <div class="{{size}}">
            <p>Search: <input ng-model="st"></p>
            <div ng-repeat="i in content.events | filter:st">
                <tr>
                    <strong>
                        <td>{{i.name}} |</td>
                        <td>{{i.where}}</td>
                    </strong>
                    <p>{{i.content}}
                    </p>
                </tr>
                <hr>
            </div>
        </div>
        <div class="col-sm-8">

            <br> <br> <br> <br> <br>
            <canvas id="myChart"></canvas>
            <br> <br> <br> <br> <br>
            <canvas id="myChart2"></canvas>
            <br> <br> <br> <br> <br>

        </div>
    </div>


</script>


<!--page1-2-->
<script type="text/ng-template" id="pages/page1-2.html">
    <h1>{{name}}
        <button class="btn btn-primary" ng-click="showText()">{{buttonText}}</button>
    </h1>


    <div class='blue'>
        <p ng-show='show'>
            {{sourceDescription}}
            <br>
            <br>
            <a href='https://jsonplaceholder.typicode.com/posts'>
                <button class="btn btn-default">Go to Source</button>
            </a>
        </p>
    </div>

    <hr>

    <div class="row">

        <div class="col-sm-6">

            <p> Built using Angular UI Grid </p>
            <div id="grid1" ui-grid="{ data: content }" class="grid"></div>
            <hr>
            <canvas id="page1-2chart"></canvas>
            <hr>
            <canvas id="page1-2chart2"></canvas>


        </div>

        <div class="col-sm-6">


            <p>Search: <input ng-model="st"></p>

            <table class="table">
                <tr>
                    <th> userID</th>
                    <th> ID</th>
                    <th> Title</th>
                    <th> Description</th>
                </tr>

                <tr ng-repeat="i in content | filter:st">
                    <td><strong> {{i.userId}} </strong></td>
                    <td> {{i.id}}</td>
                    <td> {{i.title}}</td>
                    <td> {{i.body}}</td>
                </tr>
            </table>
        </div>
    </div>


</script>


<!--1-3-->
<script type="text/ng-template" id="pages/page1-3.html">
    <h1>{{name}}
        <button class="btn btn-primary" ng-click="showText()">{{buttonText}}</button>
    </h1>
    <div class='blue'>
        <p ng-show='show'>
            {{sourceDescription}}
            <br> <br>
            <a href='https://jsonplaceholder.typicode.com/comments'>
                <button class="btn btn-default">Go to Source</button>
            </a>
        </p>
    </div>

    <p>Search: <input ng-model="st"></p>

    <table class="table table-striped">
        <tr>
            <th> postID</th>
            <th> ID</th>
            <th> Name</th>
            <th> Email</th>
            <th> Body</th>
        </tr>

        <tr ng-repeat="i in content | filter:st">
            <td><strong> {{i.postId}} </strong></td>
            <td> {{i.id}}</td>
            <td> {{i.name}}</td>
            <td> {{i.email}}</td>
            <td> {{i.body}}</td>
        </tr>
    </table>
</script>

<!--page 2-->
<script type="text/ng-template" id="page2.html">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1> {{name}} </h1>
                <hr>
            </div>

            <div class="col-sm-6">
                <label>Styles:</label>
                <div class="btn-group">
                    <button class="btn btn-primary">
                        <label><input type="radio" name="optradio" ng-click="style('s')">Small</label>
                    </button>
                    <button class="btn btn-primary">
                        <label><input type="radio" name="optradio" ng-click="style('m')" checked="checked">Medium</label>
                    </button>
                    <button class="btn btn-primary">
                        <label><input type="radio" name="optradio" ng-click="style('l')">Large</label>
                    </button>
                </div>
            </div>

        </div>
        <div class="row">
            <div class={{size}}>
                <!--1-->
                <uib-accordion>
                    <div uib-accordion-group class="panel-default" heading="Dynamic Body Content 1">

                        <p>The body of the uib-accordion group grows to fit the contents</p>
                        <button type="button" class="btn btn-default btn-sm" ng-click="addItem()">Add Item</button>
                        <div ng-repeat="item in items">{{item}}</div>
                        <button class="btn btn-default btn-sm" ng-click="send1()">SAVE</button>
                        <pre>data sent = {{data1 | json}}</pre>
                    </div>
                </uib-accordion>
            </div>
            <div class={{size}}>
                <!--2-->
                <uib-accordion>
                    <div uib-accordion-group class="panel-default" heading="Dynamic Body Content 2">
                        <div>
                            <form novalidate class="simple-form">
                                <label>Name: <input type="text" ng-model="user.a"/></label><br/>
                                <label>Location: <input type="text" ng-model="user.b"/></label><br/>
                                Gender: <label><input type="radio" ng-model="user.c" value="male"/>male</label>
                                <label><input type="radio" ng-model="user.d" value="female"/>female</label><br/>
                                <button class="btn btn-default btn-sm" ng-click="update(user)">SAVE</button>
                            </form>
                            <pre>data sent = {{master | json}}</pre>
                        </div>
                    </div>
                </uib-accordion>
            </div>

            <div class={{size}}>
                <!--3-->
                <uib-accordion>
                    <div uib-accordion-group class="panel-default" heading="Dynamic Body Content 3">
                        <div>
                            <form novalidate class="simple-form">
                                <label>Field1: <input type="text" ng-model="user.a"/></label><br/>
                                <label>Field2: <input type="text" ng-model="user.b"/></label><br/>
                                Field3: <label><input type="radio" ng-model="user.c" value="option2"/>option1</label>
                                <label><input type="radio" ng-model="user.c" value="option1"/>option2</label><br/>
                                Field4: <label><input type="radio" ng-model="user.d" value="option1"/>option1</label>
                                <label><input type="radio" ng-model="user.d" value="option2"/>option2</label><br/>
                                <label>Field5: <input type="text" ng-model="user.e"/></label><br/>
                                <label>Field6: <input type="text" ng-model="user.f"/></label><br/>
                                <input type="submit" ng-click="update(user)" value="Save"/>
                            </form>
                            <pre>user = {{user | json}}</pre>
                            <pre>data sent = {{master | json}}</pre>
                        </div>
                    </div>
                </uib-accordion>
            </div>

            <div class={{size}}>
                <!--4-->
                <uib-accordion>
                    <div uib-accordion-group class="panel-default" heading="Dynamic Body Content 4">
                        <div>
                            <form novalidate class="simple-form">
                                <label>Field1: <input type="text" ng-model="user.a"/></label><br/>
                                <label>Field2: <input type="text" ng-model="user.b"/></label><br/>
                                <label>Field3: <input type="text" ng-model="user.c"/></label><br/>
                                <label>Field4: <input type="text" ng-model="user.d"/></label><br/>
                                <label>Field5: <input type="text" ng-model="user.e"/></label><br/>
                                <label>Field6: <input type="text" ng-model="user.f"/></label><br/>
                                <label>Field7: <input type="text" ng-model="user.g"/></label><br/>
                                <label>Field8: <input type="text" ng-model="user.h"/></label><br/>
                                <label>Field9: <input type="text" ng-model="user.i"/></label><br/>
                                <label>Field10: <input type="text" ng-model="user.j"/></label><br/>
                                <label>Field11: <input type="text" ng-model="user.k"/></label><br/>
                                <label>Field12: <input type="text" ng-model="user.l"/></label><br/>
                                <label>Field13: <input type="text" ng-model="user.m"/></label><br/>
                                <label>Field14: <input type="text" ng-model="user.n"/></label><br/>
                                <input type="submit" ng-click="update(user)" value="Save"/>
                            </form>
                            <pre>user = {{user | json}}</pre>
                            <pre>data sent = {{master | json}}</pre>
                        </div>
                    </div>
                </uib-accordion>
            </div>

            <div class={{size}}>
                <!--5-->
                <uib-accordion>
                    <div uib-accordion-group class="panel-default" heading="Dynamic Body Content 5">
                        <div>
                            <form novalidate class="simple-form">
                                <label>num1: <input type="number" ng-model="num.a"/></label><br/>
                                <label>num2: <input type="number" ng-model="num.b"/></label><br/>
                                <input type="submit" ng-click="update(num)" value="Save"/>
                            </form>
                            <pre>num = {{num | json}}</pre>
                            <pre>data sent = {{master | json}}</pre>
                        </div>
                    </div>
                </uib-accordion>
            </div>

            <div class={{size}}>
                <uib-accordion>
                    <div uib-accordion-group class="panel-default" heading="Dynamic Body Content 6">
                        <div>
                            <form novalidate class="simple-form">
                                Field1:<br> <label><input type="radio" ng-model="user.a"
                                                          value="option1"/>option1</label>
                                <input type="radio" ng-model="user.a" value="option2"/>option2
                                <label><input type="radio" ng-model="user.a" value="option3"/>option3</label><br/>
                                <label><input type="radio" ng-model="user.a" value="option4"/>option4</label>
                                <label><input type="radio" ng-model="user.a" value="option5"/>option5</label><br>
                                Field2:<br> <label><input type="radio" ng-model="user.b"
                                                          value="option1"/>option1</label>
                                <label><input type="radio" ng-model="user.b" value="option2"/>option2</label>
                                <label><input type="radio" ng-model="user.b" value="option3"/>option3</label>
                                <label><input type="radio" ng-model="user.b" value="option4"/>option4</label>
                                <input type="submit" ng-click="update(user)" value="Save"/>
                            </form>
                            <pre>user = {{user | json}}</pre>
                            <pre>data sent = {{master | json}}</pre>
                        </div>
                    </div>
                </uib-accordion>
            </div>
        </div>

        <hr>
        <uib-accordion>
            <div uib-accordion-group class="panel-default" heading="Dynamic Body Content 7">
                <form novalidate class="simple-form">

                    <div class='row'>
                        <div class='col-md-2'>
                            <label>Field1:<br> <input type="text" ng-model="user.a"/></label>
                        </div>
                        <div class='col-md-2'>
                            <label>Field2:<br> <input type="text" ng-model="user.b"/></label>
                        </div>
                        <div class='col-md-2'>
                            <label>Field3:<br> <input type="text" ng-model="user.c"/></label>
                        </div>
                        <div class='col-md-2'>
                            <label>Field4:<br> <input type="text" ng-model="user.d"/></label>
                        </div>
                        <div class='col-md-2'>
                            <label>Field5 : <br> <input type="text" ng-model="user.e"/></label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            <label>Very Long Field6:<br> </label> <textarea class="form-control" rows="5"
                                                                            ng-model="user.f"></textarea>
                        </div>
                        <div class='col-md-4'>
                            <label>Very Long Field7:<br> </label><textarea class="form-control" rows="5"
                                                                           ng-model="user.g"></textarea>
                        </div>
                        <div class='col-md-4'>
                            <label>Very Long Field8:<br> </label><textarea class="form-control" rows="5"
                                                                           ng-model="user.h"></textarea>
                        </div>
                    </div>


                    <div class='row'>
                        <hr>
                        <div class='col-md-4'>
                        </div>
                        <div class='col-md-4'>
                            <h1>
                                <button class="btn btn-default btn-lg" ng-click="update(user)" type="reset">SAVE
                                </button>
                                <button class="btn btn-default btn-lg" type="reset">RESET</button>
                            </h1>
                            <br>
                            <pre>user = {{user | json}}</pre>
                            <pre>data sent = {{master | json}}</pre>
                        </div>
                    </div>
                </form>
            </div>
        </uib-accordion>
        <br>
        <div class='row'>
            <div class="col-sm-4">
                <p>
                    Please click on Dynamic Body Content to open.
                </p>
            </div>
        </div>

    </div>
</script>


<!--page 3-->
<script type="text/ng-template" id="page3.html">

    <div class="container">

        <div class="row">
            <div class="col-sm-3">

                <h1>{{name}}

                </h1>
                <hr>


            </div>

            <div class="col-sm-3">
                <h2>
                    <button class="btn btn-primary" ng-click="random(true)">Roll Dice</button>
                    <button class="btn btn-primary" ng-click="random100()">Roll Dice x 100</button>
                </h2>
            </div>
            <div class="col-sm-3">
                <h2>
                    Roll Count: {{count}}
                </h2>
            </div>

            <div class="col-sm-3">
                <h2>
                    <!--showing result depending on roll-->
                    <em style="color:red">
                        <p ng-show="face1"> {{face1text}} </p>
                        <p ng-show='face2'> {{face2text}} </p>
                        <p ng-show='face3'> {{face3text}} </p>
                        <p ng-show='face4'> {{face4text}} </p>
                        <p ng-show='face5'> {{face5text}} </p>
                        <p ng-show='face6'> {{face6text}} </p>
                        <p ng-show='face7'> {{face7text}} </p>
                    </em>
                </h2>

            </div>
        </div>
        <!--table-->
        <div>
            <table class='table table-striped'>
                <tr>
                    <th> 1</th>
                    <th> 2</th>
                    <th> 3</th>
                    <th> 4</th>
                    <th> 5</th>
                    <th> 6</th>
                </tr>
                <tr>
                    <td>{{a}}</td>
                    <td>{{b}}</td>
                    <td>{{c}}</td>
                    <td>{{d}}</td>
                    <td>{{e}}</td>
                    <td>{{f}}</td>
                </tr>
            </table>
        </div>
        <canvas id="myChartpage3"></canvas>
    </div>
</script>
<script src="js/angular.js"></script>

</body>
</html>

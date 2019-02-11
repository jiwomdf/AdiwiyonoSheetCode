@extends('layouts.master')
@section('content')
<style>
    td
    {
        padding:10px;
        text-align: center;
    }
    #popup
    {
        opacity: 0.5;
        font-size: 14px;
        top: 0;
        left: auto;
        right: 0;
        height: 100%;
        
        background-color: white;
        position: fixed;
        z-index:99;
        overflow-y: scroll;
    }
    #popup:hover
    {
        opacity: 1  ;
    }
    #content
    {
        margin: 10px;
        
    }
    #bsHover:hover
    {
        color: red;
        cursor: pointer;
    }
    #lsHover:hover
    {
        color: red;
        cursor: pointer;
    }
    #bblSortHover:hover
    {
        color: red;
        cursor: pointer;
    }
    

    /* highlight code */
   
</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.14.2/styles/default.min.css">
<link rel="stylesheet" href="css/dracula.min.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.14.2/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

<script src="js/CodingDasar.js"></script>


{{-- popup here --}}
<div id="popup" >
    <h4 id="codeTitle"></h4>
    <pre ><code class="hljs javascript" id="codes" ></code></pre>
</div>

<div class="content">

    {{-- SEARCHING SECTION --}}
    <h2>Searching</h2>
    <br>
    <table border="1">
        <tr>
            <td>Index : </td>
            <td>0</td>  
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
        </tr>
        <tr>
            <td>Item :</td>
            <td>1</td>
            <td>25</td>
            <td>44</td>
            <td>56</td>
            <td>65</td>
            <td>66</td>
            <td>71</td>
            <td>78</td>
            <td>82</td>
            <td>90</td>
            <td>96</td>
            <td>100</td>
        </tr>
    </table>
    <br>
    <table>
            <tr>
                <td>
                    <h4 id="lsHover" onclick="lsHover_OnClick()">Linear Search</h4>
                    <p>
                        <input type="text" id="txtLinear">
                        <button id="btnLinear" class="btn-primary"> Search</button>
                    </p>
                </td>
                <td>
                    <h4 id="bsHover" onclick="bsHover_OnClick()">Binary Search</h4>
                    <p>
                        <input type="text" id="txtBinary">
                        <button id="btnBinary" class="btn-primary">Search</button>
                    </p>
                </td>
                <td>
    
                </td>
            </tr>
        </table>

    <br>
    {{-- END OF SEARCHING SECTION --}}

    {{-- SORTING SECTION --}}
    <h2>Sorting</h2>
    <br>
    <table border="1">
        <tr>
            <td>Order : </td>
            <td>5</td>
            <td>12</td>
            <td>3</td>
            <td>4</td>
            <td>11</td>
            <td>6</td>
            <td>7</td>
            <td>9</td>
            <td>10</td>
            <td>8</td>
            <td>2</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Item : </td>
            <td>jiwo</td>
            <td>willy</td>
            <td>enrico</td>
            <td>hengky</td>
            <td>odi</td>
            <td>jevan</td>
            <td>kevin</td>
            <td>ko Kevin</td>
            <td>ko Subob</td>
            <td>ko Daniel</td>
            <td>christan</td>
            <td>andre</td>
        </tr>
    </table>
    <table width="79%">
        <tr>
            <td width="5%" style="align-content: left;">
                <h4 id="bblSortHover" onclick="bblSortHover_OnClick()">Bubble Sort</h4>
                <button type="button" class="btn btn-primary" id="btnBblSort">Try !</button> <br> <br>
            </td>
            <td width="5%" style="align-content: left;">
                <h4 id="mrgSortHover" onclick="mrgSortHover_OnClick()">Merge Sort</h4>
                <button type="button" class="btn btn-primary" id="btnMrgSort">Try !</button> <br> <br>
            </td>
            <td width="5%" style="align-content: left;">
                <h4 id="QuickSortHover" onclick="QuickSortHover_OnClick()">Quick Sort</h4>
                <button type="button" class="btn btn-primary" id="btnQuickSort">Try !</button> <br> <br>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table border="1"><tr id="targetSort"></tr></table>
            </td>
        </tr>
    </table>

    <br>
    {{-- END OF SORTING SECTION --}}

    {{-- TREE SECTION --}}
    <h2>Tree</h2>
    <br>
    <table border="1">
        <tr id="treeTable">
        </tr>
    </table>

    <input type="text" id="inptTree">
    <button id="btnAddTree">Add</button>
    <button id="btnDeleteTree">Delete</button>
    {{-- END OF TREE SECTION --}}
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>

    //click outsite Js
    $(".content").click(function() {
        $("#codes").html("");
        $("#codeTitle").text("");
    });
        
    //popup using Javascript
    function bsHover_OnClick()
    {
        $.ajax({
            url : "code/BinarySearch.html",
            success : function(result){
                $("#codes").html(result);
                $("#codeTitle").text("The code will appear here")
                document.querySelectorAll('pre code').forEach((block) => {
                    hljs.highlightBlock(block);
                });
            } 
        });
    }

    function lsHover_OnClick()
    {
        $.ajax({
            url : "code/LinearSearch.html",
            success : function(result){
                $("#codes").html(result);
                $("#codeTitle").text("The code will appear here")
                document.querySelectorAll('pre code').forEach((block) => {
                    hljs.highlightBlock(block);
                });
            } 
        });
    }

    function bblSortHover_OnClick()
    {
        $.ajax({
            url : "code/BubbleSort.html",
            success : function(result){
                $("#codes").html(result);
                $("#codeTitle").text("The code will appear here")
                document.querySelectorAll('pre code').forEach((block) => {
                    hljs.highlightBlock(block);
                });
            } 
        });
    }
    
</script>

@stop
let arr = [ 1, 25, 44, 56, 65, 66,
    71, 78, 82, 90, 96, 100
    ];

let arr2 = [ "jiwo", "willy", "enrico", "hengky", "odi", "jevan",
    "kevin", "ko Kevin", "ko Subob", "ko Daniel", "christan", "andre",
    ];

$(document).ready(function(){

function StartSort()
{
    let spanBblSort = document.getElementById("targetSort");
    spanBblSort.innerHTML = "";
    
    let start = new Date().getMilliseconds();
    return start;
}

function EndSort(start,arrResult)
{
    let end = new Date().getMilliseconds();
    alert("The Sort take time by : " + (end - start).toString());

    let spanBblSort = document.getElementById("targetSort");
    spanBblSort.innerHTML += "<td>Item : </td>";

    for(let i = 0; i < arrResult.length; i++)
    {
        spanBblSort.innerHTML += "<td>" + arrResult[i] + "</td>";
    }
}

/* LINEAR SEARCH
 * by Jiwo 
 */
$("#btnLinear").click(function(){

    let flag = false;
    let start = new Date().getMilliseconds();

    for(let i = 0; i < arr.length; i++)
    {
        if(arr[i] == $('#txtLinear').val())
        {
            let end = new Date().getMilliseconds();
            alert(arr[i]  + " found on index " + i + " using linear search by time " + (end - start).toString());
            flag = true; console.log(flag);

            break;
        }
        else
        {
            flag = false;
        }
    }

    if(!flag)
    {
        console.log($('#txtLinear').val());
        let end = new Date().getMilliseconds();
        alert("item not found by time " + (end - start).toString());
        console.log(flag);
    }
});

/* BINARY SEARCH
 * by Jiwo 
 */
$("#btnBinary").click(function(){

let start = new Date().getMilliseconds();
let input = $("#txtBinary").val();

if(BinarySearch(arr,input))
{
    let end = new Date().getMilliseconds();
    alert("Found " + arr[med] + " on index " + med + " by time " + (end - start).toString())
}
else
    alert("Data not found");

});

//function Binary Search agar bisa dipake berulang
function BinarySearch(arr,input)
{
    let con = false;
    let low = 0;
    let high = arr2.length - 1 ;

    while(low <= high)
    {
        let temp =  ( high - low );

        //bila data ganjil
        if(temp % 2 != 0 )
            med = ( high - low )/2 + low - 0.5;
        else
            med = ( high - low )/2 + low;

        if(input == arr[med])
            return true;

        //bila lebih kecil
        if( input < arr[med])
            high = med - 1;
        //bila lebih besar
        else
            low = med + 1;
    }

    return false;
}

/* BUBBLE SORT
 * by Jiwo 
 */
$("#btnBblSort").click(function(){

    let start = StartSort();
    let arrInput = [...arr2];

    for(let j = 0; j < arrInput.length-1; j++)
    {
        for(let i = 0; i < arrInput.length-1; i++)
        {
            let nextVar = i +1;
            let cFirst = arrInput[i].split('');
            let cNext = arrInput[nextVar].split('');
    
            if(cFirst[0] == cNext[0])
            {
                for(let ii = 1; ii < cFirst.length; ii++)
                {
                    if(cFirst[ii] == cNext[ii])
                    {
                        //do nothing
                    }
                    else if(cFirst[ii] > cNext[ii])
                    {
                        swap(i,arrInput);
                        break;
                    }
                    else
                        break;
                }
            }
            else if(cFirst[0] > cNext[0])
            {
                swap(i,arrInput);
            }
        }
    }

    EndSort(start,arrInput);
});

function swap(i,arrInput)
{
    let temp;
    
    temp = arrInput[i+1];
    arrInput[i+1] = arrInput[i];
    arrInput[i] = temp;
}

/* MERGE SORT
 * by Jiwo 
 */
$('#btnMrgSort').click(function(){

    let start = StartSort();

    let result = mergerSort(arr2);

    EndSort(start,result);
});

function mergerSort(arrInput)
{
    if(arrInput.length >= 2)
    {
        let middle = Math.floor(arrInput.length/2);
        let left = arrInput.slice(0,middle);
        let right = arrInput.slice(middle);

        return merge(mergerSort(left), mergerSort(right));
    }
    else
        return arrInput;
}

function merge(left,right)
{
    let result = [];

    while(left.length && right.length)
    {
        leftIdx = left[0].split('');
        rightIdx = right[0].split('');

        if(leftIdx[0] < rightIdx[0])
        {
            result.push(left.shift());
        }
        else if(leftIdx[0] == rightIdx[0])
        {
            for(let ii = 1; ii < leftIdx.length; ii++)
            {
                if(leftIdx[ii] > rightIdx[ii])
                {
                    result.push(right.shift());
                    break;
                }
                else if(leftIdx[ii] < rightIdx[ii])
                {
                    result.push(left.shift());
                    break;
                }
            }
        }
        else
            result.push(right.shift());
    }

    return result.concat(left,right);
}

/* Quick SORT
 * by Jiwo 
 */
$('#btnQuickSort').click(function(){

    let start = StartSort();
    //start function
    let result = QuickSort(arr2);
    EndSort(start,result);

});

function QuickSort(arrInput)
{
    /*kalau isi dari arraynya sudah tinggal 1 
      atau tidak ada setelah recursive (finish)*/
    if(arrInput.length < 2 )
    {
        return arrInput;
    }

    let pivot = arrInput[arrInput.length - 1];
    let left = [];
    let right = [];

    //di loop sampe sebelum pivot
    for(let i = 0; i < arrInput.length - 1; i++)
    {
        if(arrInput[i] < pivot)
            left.push(arrInput[i]);
        else
        {
            if(arrInput[i] == pivot)
            {
                leftIdx = arrInput[i].split('');
                rightIdx = pivot.split('');

                for(let ii = 1; ii < leftIdx.length; ii++)
                {
                    if(leftIdx[ii] > rightIdx[ii])
                    {
                        result.push(right.shift());
                        break;
                    }
                    else if(leftIdx[ii] < rightIdx[ii])
                    {
                        result.push(left.shift());
                        break;
                    }
                }
            }
            else
                right.push(arrInput[i]);
        }
    }

    let result = [...QuickSort(left),pivot,...QuickSort(right)];
    
    return result;
}

/* Binary Tree
 * by Jiwo 
 */
class Node
{
    constructor(data, left = null, right = null)
    {
        this.data = data;
        this.left = left;
        this.right = right;
    }
}

class BST
{
    constructor()
    {
        this.root = null;
    }

    add(data)
    {
        const node = this.root;

        if(node === null)
        {
            this.root = new Node(data);
            return;
        }
        else
        {
            function searchTree(node)
            {
                if(data < node.data)
                {
                    if(node.left === null)
                    {
                        node.left = new Node(data);
                        return;
                    }
                    else if(node.left !== null)
                    {
                        return searchTree(node.left);
                    }
                }
                else if(data > node.data)
                {
                    if(node.right === null)
                    {
                        node.right = new Node(data);
                        return;
                    }
                    else if(node.right !== null)
                        return searchTree(node.right);
                }
                else
                {
                    return null;
                }
            };
            
            return searchTree(node);
        }
    }

    remove(data) 
    {
        const removeNode = function(node, data) 
        {
            if (node == null) 
            {
                return null;
            }
            if (data == node.data)
            {
                // node has no children 
                if (node.left == null && node.right == null) 
                    return null;
                
                // node has no left child 
                if (node.left == null) 
                    return node.right;

                // node has no right child 
                if (node.right == null) 
                    return node.left;

                // node has two children 
                var tempNode = node.right;

                while (tempNode.left !== null) 
                {
                    tempNode = tempNode.left;
                }

                node.data = tempNode.data;
                node.right = removeNode(node.right, tempNode.data);
                return node;
            }
            else if (data < node.data) 
            {
                node.left = removeNode(node.left, data);
                return node;
            }
            else
            {
                node.right = removeNode(node.right, data);
                return node;
            }
        }
        this.root = removeNode(this.root, data);
    }
}

//call the Tree
const bst = new BST();

$("#btnAddTree").click(function()
{
    let input = $("#inptTree").val();
    bst.add(input);

    $("#treeTable").append("<td>" + input + "</tr>");
});

});
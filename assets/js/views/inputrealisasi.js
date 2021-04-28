
    function CheckData(val) {
        let element = document.getElementById('uraian_other');
        if (val == 'others') {
            element.style.display='block';
            element.setAttribute("name", "uraian");
        } else{
            element.style.display='none';
        }
    }







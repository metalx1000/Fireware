function save_local(item){
    var item = item 
    var storage = "localStorage." + item;
    console.log(storage);
    $("#" + this.item).change(function(){
        console.log("Saving " + this.item );
        storage = $("#" + this.item).val();
    });

}

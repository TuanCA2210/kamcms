

$('body').on('click', '.click_pop', function(event) {
	event.preventDefault();
	selectFileWithCKFinder('ckfinder-input-1');
});



function selectFileWithCKFinder() {
    var finder = new CKFinder();
    //finder.basePath = '../';    // The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = function(fileUrl){
         console.log(fileUrl);
    };
    finder.popup();
}


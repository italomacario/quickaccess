function removeToggled() {
	$(".page-wrapper").removeClass("toggled");
  }
  
  function addToggled(){
	$(".page-wrapper").addClass("toggled");
  }
  
  function DeleteModal(e){
	e = e || window.event;
	var target = e.target || e.srcElement,
		text = target.href   
	if(target.id  == 'url'){
	  document.getElementById('modalDelete').action = text
	}
  };

function alterModal(e)
{
	e = e || window.event;
	var target = e.target || e.srcElement,
	text = target.href   
if(target.id  == 'url')
{
	document.getElementById('modalAlterUser').action = text
}};
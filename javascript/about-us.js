function showMembersTeam(AboutUsID, AboutUsMembersID){
    document.getElementById(AboutUsID).style.display = "none";
    document.getElementById(AboutUsMembersID).style.display = "flex";
}

function goBack(AboutUsID, AboutUsMembersID){
    document.getElementById(AboutUsID).style.display = "flex";
    document.getElementById(AboutUsMembersID).style.display = "none";
}

var twoSum = function (nums, target) {
    for(let i=0;i<nums.length;$i++){
        for(let j=0; j<i; j++){
            if(nums[i]+nums[j]===target){
                return [i,j];
            }
        }
    }
}

var twoSum = function (nums ,target){
    let map;
    for (let i=0;i<nums.length;i++) {
        value = nums[i];
        comp = target-nums[i];
        if(map[comp]!==undefined){
            return[map[comp],i];
        }else{
            map[value] = i;
        }
    }
    return null;
}

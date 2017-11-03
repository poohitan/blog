function User(name, avatarPath) {
    this.name = name;
    this.avatarPath = avatarPath;
    this.blocked = false;
    
    this.block = function() {
        this.blocked = true;
    }
    this.unblock = function() {
        this.blocked = false;
    }
}
    
var usersOnline = {
    usersList : [],
    add : function(user) {
        this.usersList.push(user);
    }
}

var blackList = {
    usersList : [],
    add : function(user) {
        this.usersList.push(user);
    }
}

function Message(sender, body, datetime) {
    this.sender = sender;
    this.body = body;
    this.datetime = datetime;
}

function sendMessage(message) {
    //not implemented
}

///////////////////////// TESTING /////////////////////////
    
var JohnSmith = new User("John Smith", "https://pbs.twimg.com/profile_images/3067041794/14a9835f966ea4c9ea8716dde0480c41.png");
var MariaLassnig = new User("Maria Lassnig", "http://s3.evcdn.com/images/block/I0-001/001/527/846-4.jpeg_/maria-lassnig-46.jpeg");
var Muhammad = new User("Muhammad III as-Sadiq", "http://cdn.slidesharecdn.com/profile-photo-AbubakarSadiqMuhammad-96x96.jpg");
var SigiSchmid = new User("Sigi Schmid", "https://pbs.twimg.com/profile_images/378800000228573751/95e2f5a919c78c57c55fdff0981c446a.jpeg");
var MarkSelby = new User("Mark Selby", "http://www.peoples.ru/sport/billiards/mark_selby/selby_4.jpg");
var WilhelmSteinitz = new User("Wilhelm Steinitz", "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Wilhelm_Steinitz2.jpg/220px-Wilhelm_Steinitz2.jpg");

usersOnline.add(JohnSmith);
usersOnline.add(MariaLassnig);
usersOnline.add(Muhammad);
usersOnline.add(SigiSchmid);
usersOnline.add(MarkSelby);
usersOnline.add(WilhelmSteinitz);

for (var i = 0; i < usersOnline.usersList.length; ++i) {
    showUser(usersOnline.usersList[i]);
}
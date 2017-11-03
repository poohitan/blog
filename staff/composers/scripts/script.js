$("a").on("click", function(e) {
    if (!$(this).hasClass("reload")) {
        e.preventDefault();
        
        var thisId = $(this).attr("id");
        var that = $("#content #" + thisId);
        
        if (!$(this).hasClass("active") && that.html().length != 0) {
            changeContent(that, 400);
        }
        
        $("a").removeClass("active");
        $("#menu a#" + thisId).addClass("active");
        
        if (thisId == "theory") {
            triggerSubMenu(300);
        } 
        
        if (thisId == "baroque" || thisId == "classical" || thisId == "romantic") {
            triggerSubMenu(300, false); 
        }
        
        if (thisId == "tests") {
            triggerSubMenu(300, true);
            
            generateTests();
        }
    }
});

$(".scrollTop").on("click", scrollToTop);

function changeContent(newContent, animationDuration) {
    hideContent();
    newContent.fadeIn(animationDuration);
}

function triggerSubMenu(animationDuration, forceHide) {
    console.log(forceHide);
    
    if (forceHide == true) {
        $("#menu .sub").fadeOut(animationDuration);
        return;
    }
    
    if (forceHide == false) {
        $("#menu .sub").fadeIn(animationDuration);
        return;
    }
    
    if ($("#menu .sub").is(":visible")) {
        $("#menu .sub").fadeOut(animationDuration);
    }
    else {
        $("#menu .sub").fadeIn(animationDuration);
    }   
}

function hideContent() {
    var items = $("#content").children();
    $.each(items, function(i, item) {
        $(item).hide();
    });
}

var questionsForCurrentSession;

function fillQuestionsForCurrentSession() {
    questionsForCurrentSession = [];
    
    globalQuestions = shuffle(globalQuestions);
    
    for (var i = 0; i < 10; ++i) {
        questionsForCurrentSession.push(globalQuestions[i]);
    }
}

function generateTests() {
    fillQuestionsForCurrentSession();
    var questions = questionsForCurrentSession;
    questions = shuffle(questions);
    
    var questionTemplate;
    var questionsContainer = $("#tests form ol");
    
    $("form .question").remove();

    for (var i = 0; i < questions.length; ++i) {
        questionTemplate = '<li class="question"><div>' +
            '<div><span>' + questions[i].title + '</span></div>';
        
        var answers =  questions[i].answers;
        answers = shuffle(answers);
        for (var j = 0; j < answers.length; ++j) {
            questionTemplate += '<div><input type="radio" data-answerId="' + answers[j].id +
                '" data-questionId="' + questions[i].id + 
                '" id="answer' + questions[i].id + '-' + 
                answers[j].id + '" class="answer" name="answer' + questions[i].id + '"/>' +
                '<label for="answer' + questions[i].id + '-' + answers[j].id + '">' + 
                answers[j].title + '</label></div>'
        }
        
        questionTemplate += '</div></li>';
        
        questionsContainer.append(questionTemplate);
    }
}


$("#tests input#submit").on("click", function(e) {
    e.preventDefault();
    var testResult = getTestResult();
    if (testResult != false) {
        var points = checkAnswers(testResult);
        $("#menu a").removeClass("active");
        showResults(points, testResult);
    }
});

$("#tests-results #onceMore").on("click", function() {
    scrollToTop();
    changeContent($("#content #tests"), 400);
    $("a").removeClass("active");
    $("#menu a#tests").addClass("active");
    generateTests();
});

function getTestResult() {
    var allAnswers = $("form#questions").find(".answer");
    var testResult = {};
    var countOfAnsweredQuestions = 0;
    
    $.each(allAnswers, function(i, answer) {
        if ($(answer).is(":checked")) {
            var questionId = $(this).attr('data-questionId');
            var answerId = $(this).attr('data-answerId');
          //  console.log(questionId);
        //    console.log(answerId);
            testResult[questionId] = answerId;
            ++countOfAnsweredQuestions;
        }
    });
    
   // console.log(allAnswers)[0];
    console.log(testResult);
    
    if (countOfAnsweredQuestions < questionsForCurrentSession.length) {
        showAlert("Будь ласка, дайте відповіді на всі запитання.", 150);
        setTimeout(function() {
            hideAlert(500);
        }, 2000);
        return false;
    }
    else {
        return testResult;
    }
}

function checkAnswers(testResult) {
    var points = 0;

    for (var key in testResult) {
        for (var i = 0; i < questionsForCurrentSession.length; ++i) {
            var question = questionsForCurrentSession[i];
            if (question.id == key) {
                for (var j = 0; j < question.answers.length; ++j) {
                    var answer = question.answers[j];
                    if (answer.id == testResult[key] && answer.correct == true) {
                        points += 1;
                    }
                }
            }
        }
    }
    
    return points;
}

function showResults(points, testResults) {
    changeContent($("#tests-results"), 300);
    
    $("#tests-results .container p").remove();
    $("#tests-results .container ol").remove();
    
    var percent = points * 100 / questionsForCurrentSession.length;
    
    var info = '<p>Ви набрали <b>' + Math.round(percent, 2) + '%</b> правильних відповідей (<b>' + points + '</b> із <b>' + questionsForCurrentSession.length + '</b>).</p>';
    $("#tests-results .container").append(info);
    $("#tests-results .container").append("<ol></ol>");
    
    var correctAnswerTemplate;
    
    for (var key in testResults) {
        for (var i = 0; i < questionsForCurrentSession.length; ++i) {
            var question = questionsForCurrentSession[i];
            
            if (question.id == key) {
                correctAnswerTemplate = '<li><div class="test-result">' +
                    '<div class="question"><span>' + question.title + '</span></div>';
                
                for (var j = 0; j < question.answers.length; ++j) {
                    var answer = question.answers[j];
                    
                    if (answer.id == testResults[key]) {   
                        if (answer.correct == true) {
                            correctAnswerTemplate += '<div class="answer correct"><span>' + answer.title + '</span></div>';
                        }
                        else {
                            correctAnswerTemplate += '<div class="answer incorrect"><span>' + answer.title + '</span></div>';
                        }
                    }
                }
                
                correctAnswerTemplate += '</div></li>';
                
                $("#tests-results .container ol").append(correctAnswerTemplate);
            }
        }
    }
}

function showAlert(text, animationDuration) {
    $("#alert .content").html("<span>" + text + "</span>");
    $("#alert").fadeIn(animationDuration);
    $("#shadow").fadeIn(animationDuration);
}

function hideAlert(animationDuration) {
    $("#alert").fadeOut(animationDuration);
    $("#shadow").fadeOut(animationDuration);
}

function scrollToTop() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
}

$("#alert .close").on("click", function() {
    hideAlert(150);
});

$("audio").on("click", function() {
    var that = this;
    console.log(that.paused);
    if (that.paused) {
        $.each($("audio"), function (number, audio) {
            $(audio)[0].pause();
        });
        that.pause();
        console.log(that);
    }
    else {
        if ($("#sound-trigger").hasClass("enabled")) {
            setTimeout(function() {
                $("audio#background-music")[0].play();
            }, 1500);
        }
    } 
});

$("#sound-trigger").on("click", function() {
    if ($(this).hasClass("enabled")) {
        $(this).removeClass("enabled").addClass("disabled");
        $("audio#background-music")[0].pause();
    }
    else {
        $(this).removeClass("disabled").addClass("enabled");
        $("audio#background-music")[0].play();
    }
});
//+ Jonas Raoni Soares Silva
//@ http://jsfromhell.com/array/shuffle [v1.0]
function shuffle(o) { //v1.0
    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
};


$(document).ready(function() {
    $("#wrapper").fadeIn(500, function() {
   //     $("audio#background-music")[0].play();
    });  
});
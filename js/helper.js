
var ANSWER = process.argv.pop(),
    start;

function result (attempt) {
  var time = Date.now() - start;

  if (+ANSWER === +attempt) {
    console.log('Success!');
    console.log('Total time, ' + time + ' miliseconds.');
  } else {
    console.log('Keep trying.');
    console.log(attempt);
  }
}

start = Date.now();

module.exports = result;

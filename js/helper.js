
var start;

function mtime () {
  return Date.now();
}

function result (ANSWER, attempt) {
  if (ANSWER === attempt) {
    console.log('Success!');
    console.log('Total time, ' + (mtime() - start) + ' miliseconds.');
  } else {
    console.log('Keep trying.');
    console.log(attempt);
  }
}

start = mtime();

module.exports = result;


module.exports = function (attempt) {
  if (+process.argv.pop() === +attempt) {
    console.log('Success!');
    console.log('Total time');
  } else {
    console.log('Keep trying.');
    console.log(attempt);
  }
}

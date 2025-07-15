# calliope.mx
This is the code for my website [calliope.mx](https://calliope.mx). At the moment, the calliope.mx page is overwhelmingly dedicated to my academic website ([academic.calliope.mx](https://academic.calliope.mx)), but it also hosts my [minims page](https://calliope.mx/minims) 

## Minims
My [minims page](https://calliope.mx/minims) is some very old code for enumerating all possible strings with a certain number of [minims](https://en.wikipedia.org/wiki/Minim_(palaeography)).
### Usage
Insert a number of minims. The page will return all possible strings of the letters `I`, `M`, `N`, `U`, or `V` that sum to the total number of minims inserted, where `M` is three minims, `I` is one minim and all other letters are two minims.
Using the 'Text before' and 'Text after' boxes will pre/append those strings to the outputs with no other functionality. Thus if you saw the word `||||||||||AL|TY` (where `|` means a minim), you can deduce that the final minim is an `I`. Keep 'Text before' blank, put in 10 for the number of minims and put in `ALITY` for 'Text after'. After searching the 3772 possible outputs, you will find that `MINIMALITY` is most likely.
### To-do
* Create a more regex-style input system, where one could either put in `||||||||||AL|TY`, or `10AL|TY`, etc.
* Calculate the number of outputs
* Maybe try to rank the outputs based on how likely they are to be words
  * Maybe maybe let people put in their own dictionaries

## Academic
Until recently, my website was all hard-coded html that was just meant to show off my papers. However, I am gaining more of an interest in software development and thought that this would be a good exercise for learning the basics of PHP, SQL and JavaScript. Therefore I have expanded the website to include a `.bib` file and a list of my talks that updates dynamically based on a SQL database.

### Set theory charades
There is a certain mode of charades played at conferences sometimes in which all guessed inputs are from the index of _Set Theory_ by Thomas Jech. I have created a tool that will pick one of these at random for you. However, it is still in a very raw state as all the data was scrubbed through partially computationally, partially by hand, and all over the course of about an hour. You can see the text file at `academic/charades/lines.txt`. You can report broken entries, but I may not update this for a while.

### To-do
* Create an actual non-academic website for [calliope.mx](https://calliope.mx). At the moment, it just redirects to [academic.calliope.mx](https://academic.calliope.mx).
* Make the website look a bit less default. While I want the website to remain extremely simple and quick to load, it could probably do with not having just `#000000` and `#FFFFFF` as the only background colours.
* Fix `lines.txt` for set theory charades and implement difficulty levels.

### Credit
Thanks to the [Student-Run Computing Facility (SRCF)](https://srcf.net) for hosting the page and database. Extremely good resource if you happen to be a Cambridge graduate.

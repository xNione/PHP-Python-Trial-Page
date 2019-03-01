import random #imports a random variable generator


GroupSize = int(input("Enter a Group Size:")) #creates a input cursor for the user to input the group size

#opens the file that stores the info
File= open("Data.txt","r")

#sets a number of lists to hold members and groups in groups.
groups = {} #holds the group names
GroupID = [] #holds the users that belong in the group

Lines = File.readlines()
random.shuffle(Lines) # randomizes the list of lines it reads so its never the same order of users

#does a loop for every line it reads after randomizing it
for Line in Lines:
    data = Line.strip().split(",") #splits the info from the line to seperate every value that will be placed for a variable
    firstname = data[0]  # initializations of variables start
    lastname = data[1]
    intvacaplan = data[2]
    date = data[3]
    groupnum = 0 # starts the group numbers at 0 when creating groups
    groupID = intvacaplan+date #the group will be known as the vacation plan along with the date it will be taken
    Check = False

    while Check == False: # repeats this process to each line until the line is completed
        groupnumstr = str(groupnum)
        groupid = groupID+groupnumstr # made it easier to read so it knows what group is in groups.


        if groupid in groups: # checks if group exists already in groups{}

            if len(groups[groupid]) < GroupSize: # checks if spots are available for inserting another user
                groups[groupid].append(firstname + " " + lastname)
                Check = True
            
            else:
                Check = False
                groupnum += 1
        
        else:
            GroupID.append(intvacaplan)
            GroupID.append(date)
            groups[groupid] = [firstname + " " + lastname]
            Check = True

print(groups)


File.close()
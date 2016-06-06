#!/bin/bash

SHUFFLED_FILE="shuffled_$1"

rm -rf $SHUFFLED_FILE

python -c "import random, sys; lines = open(sys.argv[1]).readlines(); random.shuffle(lines); print ''.join(lines)," $1 > "shuffled_$1"

rm -rf $1
mv $SHUFFLED_FILE $1


